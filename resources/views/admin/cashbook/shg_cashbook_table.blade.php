<table id="block_datatable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Transanction Type</th>
            <th>Debit Amount</th>
            <th>Credit Amount</th>
            <th>On Date</th>
             
        </tr>
    </thead>
    <tbody>
       @foreach ($shgcashbooks as $shgcashbook)
      
        <tr>
            <td>{{ $shgcashbook->transaction_type }}</td>
            <td>{{ $shgcashbook->debit }}</td>
            <td>{{ $shgcashbook->credit }}</td>
            <td>{{ date('d-m-Y',strtotime($shgcashbook->ondate)) }}</td>
        </tr> 
       @endforeach
    </tbody>
</table>