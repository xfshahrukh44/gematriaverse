<script>
    function trackTimeSpent(featureName, logRoute, csrfToken) {
        let startTime = Date.now();
        let activeTime = 0;
        let isActive = true;
        let lastActivityTime = Date.now();

        function updateTimeSpent() {
            if (isActive) {
                activeTime += Date.now() - lastActivityTime;
                lastActivityTime = Date.now();
            }
        }

        function pauseTimer() {
            isActive = false;
            updateTimeSpent();
        }

        function resumeTimer() {
            isActive = true;
            lastActivityTime = Date.now();
        }

        // Set inactivity timeout (e.g., 1 minute)
        let inactivityTimeout;
        function resetInactivityTimeout() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(pauseTimer, 60000); // 1 minute of inactivity
        }

        // Event listeners to detect user activity
        ['mousemove', 'mousedown', 'keydown', 'touchstart', 'scroll'].forEach(event => {
            window.addEventListener(event, () => {
                if (!isActive) resumeTimer();
                resetInactivityTimeout();
            });
        });

        // Start inactivity timer on page load
        resetInactivityTimeout();

        // Send log before page unload
        window.addEventListener('beforeunload', function () {
            if (isActive) updateTimeSpent(); // Ensure active time is updated
            let timeSpent = Math.round(activeTime / 1000); // time spent in seconds

            fetch(logRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    feature_name: featureName,
                    time_spent: timeSpent
                })
            });
        });
    }
</script>
