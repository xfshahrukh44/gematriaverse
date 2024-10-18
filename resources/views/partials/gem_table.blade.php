<div id="GemTable">
    @foreach ($ciphers as $index => $cipher)
        @php
            $rgb = json_decode($cipher['rgb_values'], true);
            $red = $rgb['red'] ?? 0;
            $green = $rgb['green'] ?? 0;
            $blue = $rgb['blue'] ?? 0;
        @endphp
        <div class="col-lg-2 pl-1 pr-1" id="TableValue_{{ $cipher['name'] }}">
            <div class="data-ciphers change-cipher" data-id="{{ $cipher['id'] }}" onclick="MoveCipherClick('{{ $cipher['id'] }}', event)"
                style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                <div class="chiphers-info">
                    <h5 style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                        {{ $cipher['name'] }}
                    </h5>
                </div>
                <div class="chiphers-data-number">
                    @if ($cipher['id'] == 'D0')
                        <p id="ordinal" class="justnumber" style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                            onclick="Open_Properties(0)">0</p>
                    @elseif($cipher['id'] == 'D1')
                        <p id="reduction" class="justnumber" style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                            onclick="Open_Properties(1)">0</p>
                    @elseif($cipher['id'] == 'D2')
                        <p id="reverse" class="justnumber" style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                            onclick="Open_Properties(2)">0</p>
                    @elseif($cipher['id'] == 'D3')
                        <p id="reverse_reduction" class="justnumber" style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                            onclick="Open_Properties(3)">0</p>
                    @else
                        <p id="cipher_{{ $cipher['id'] }}"
                            class="justnumber target_number" style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                            onclick="Open_Properties({{ $cipher['id'] }})">0</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
