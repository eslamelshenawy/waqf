<input type="{{ $field['type'] ?? 'text' }}"
       @isset($field['name']) name="{{ $field['name'] }}" @endisset
       class="form-control @isset($field['classes']) @foreach($field['classes'] as $class) {{ $class }} @endforeach @endisset" placeholder="{{ $field['placeholder'] ?? '' }}"
       id="{{ $field['id'] ?? '' }}"  />