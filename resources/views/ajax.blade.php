<script>
function trackTimeSpent(featureName, logRoute, csrfToken) {
    let startTime = Date.now();

    window.addEventListener('beforeunload', function () {
        let endTime = Date.now();
        let timeSpent = Math.round((endTime - startTime) / 1000); // time spent in seconds

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
