@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Joining / Proceeding (Mrs. Renu Swami, Lecturer in Hindi)</h2>
	</div>
</section>
	<div class="container" style="overflow-x: auto;">

        <table border="2" width="100%" style="font-size:20px">

            <tbody>
            <tr>
                <td width="50%" valign="top" align="center">Joining</td>
                <td width="50%" valign="top" align="center">Proceeding</td>
            </tr>
            
            <tr>

                <td valign="top"><img border="1" src="{{ asset('images/img/join_2_1.jpg') }}" width="422"></td>
                <td valign="top"><img border="1" src="{{ asset('images/img/join_2_2.jpg') }}" width="422"></td>

            </tr>

        </tbody></table>
                
  	</div>
@endsection

		