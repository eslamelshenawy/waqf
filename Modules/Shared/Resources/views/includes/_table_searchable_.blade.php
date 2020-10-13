<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card text-left">

            <div class="card-body">
                <h4 class="card-title mb-3">{{ $title }}</h4>

                <p>
                </p>

                <div class="table-responsive">
                    <table id="multicolumn_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            @foreach($heads as $head)
                                <th>{{ $head }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elements as $index => $element)
                            <tr>
                                <td>{{ ++$index }}</td>
                                @foreach($attrs as $attr)
                                    <td>{{ $element->{$attr} }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            @foreach($heads as $head)
                                <th>{{ $head }}</th>
                            @endforeach
                        </tr>
                        </tfoot>
                    </table>

                    <button class="btn btn-raised btn-raised-primary btn-rounded m-1"
                            onclick="location.href = '{!! $route !!}'">&plus; {{ __('shared::actions.add') }}</button>

                </div>

            </div>
        </div>
    </div>
</div>
