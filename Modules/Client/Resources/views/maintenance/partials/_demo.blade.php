@component('shared::components._modal_', $modal=['title' => 'Maintenance Order'])
    @component('shared::components._form_', ['fm' => 'POST', 'fa' => '/d'])
        @component('shared::components._form_group_')
            @label($field=['for' => 'name', 'label' => 'الاسم'] )
            @input($field=['type' => 'text', 'name' => 'name', 'id' => 'name'])
        @endcomponent
        @component('shared::components._form_group_')
            @label($field=['for' => 'mobile', 'label' => 'الجوال'] )
            @input($field=['type' => 'tel', 'name' => 'mobile', 'id' => 'mobile'])
        @endcomponent
        @component('shared::components._form_group_')
            @label($field=['for' => 'apartment_id', 'label' => 'الشقة'] )
            @include('shared::lists._cities')
        @endcomponent
        @component('shared::components._form_group_')
            @label($field=['for' => 'date_at', 'label' => 'التاريخ'] )
            @input($field=['type' => 'date', 'name' => 'name', 'id' => 'dateAt'])
        @endcomponent
        @component('shared::components._form_group_')
            @label($field=['for' => 'description', 'label' => 'وصف المشكلة'] )
            @textarea($field=['name' => 'name', 'id' => 'description'])
        @endcomponent
        @component('shared::components._form_group_')
            @button($btn=['type' => 'submit', 'title' => 'طلب صيانة'])
        @endcomponent
    @endcomponent
@endcomponent
