<form>
    @foreach($data as $step)
        @foreach($step as $label => $options)
            @if(is_string($options))
                @if($label === 'submit')
                    <button type="button">Submit</button>
                @elseif($label)
                    <p>{{ $options }}</p>
                @endIf
            @elseif(true === false) {{-- 'TODO: Handle if individual option value is a collection instead of string, set data attributes to pass data to jQuery script for manufacturer => cars options reduction/ajax submission --}}
                @if($option instanceof \Illuminate\Support\Collection)
                    {{ dd($options->flatten()) }}
                @endif
            @else
                <select>
                    <option value="">{{ $label }}</option>
                    @foreach($options as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            @endif
        @endforeach
    @endforeach
    {{-- TODO: Add hidden quiz_type field --}}
</form>
