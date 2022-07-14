<form>
    @foreach($data as $step)
        @foreach($step as $label => $options)
            @if(is_string($options))
                @if($label === 'submit')
                    <button type="button">Submit</button>
                @elseif($label)
                    <p>{{ $options }}</p>
                @endIf
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
</form>
