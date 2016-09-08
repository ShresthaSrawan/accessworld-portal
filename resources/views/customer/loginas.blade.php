<div class="card sub-card card-underline">
    <div class="card-body">
        <table id="customer-datatable" class="table order-column hover" data-source="{{route('api.customer')}}">
            <thead>
            <tr>
                <th>Avatar</th>
                <th>Customer</th>
                <th>Username</th>
                <th>Email</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

{{ Html::script('assets/js/customer-datatable.js') }}