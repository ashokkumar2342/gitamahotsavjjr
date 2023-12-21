@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Faculty</h2>
	</div>
</section>
	<div class="container" style="overflow-x: auto;">
		<table class="table" border="2" style="font-size:20px">
		<tbody>
		<tr>
		<td colspan="6" align="center"><strong>Annual Teaching Staff/ Administrative Staff (Non-Teaching) return performa detail</strong></td>
		</tr>
		<tr>
		<td>Sr. No.</td>
		<td>Name of the Faculty</td>
		<td>Designation</td>
		<td>Date of Joining&nbsp;</td>
		<td>Mobile no.</td>
		<td>Subject</td>
		</tr>
		<tr>
		<td>1</td>
		<td>Dr. Kanchan&nbsp;&nbsp; D/o Sh. Rajinder Kumar</td>
		<td>Principal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>14.10.2022</td>
		<td>9812450889</td>
		<td>Commerce</td>
		</tr>
		<tr>
		<td>2</td>
		<td>Dr. Renu Swami&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Gopal Krishan Sharma</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>16.10.2006</td>
		<td>7988973177</td>
		<td>Hindi</td>
		</tr>
		<tr>
		<td>3</td>
		<td>Dr. Suman Arora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Tilak Raj</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>16.10.2006</td>
		<td>9729220722</td>
		<td>Maths</td>
		</tr>
		<tr>
		<td>4</td>
		<td>Dr. Seema Taneja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Shanti Sarup Kalra</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>03.11.2006</td>
		<td>9215519860</td>
		<td>Education</td>
		</tr>
		<tr>
		<td>5</td>
		<td>Dr. Sheetal Dalor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Jagdish Chander</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>18.11.2019</td>
		<td>9306824228</td>
		<td>Hindi</td>
		</tr>
		<tr>
		<td>6</td>
		<td>Mr. Ved Parkash&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; S/o Sh. Ram Kumar</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>05.12.2022</td>
		<td>9034341177</td>
		<td>S.St.</td>
		</tr>
		<tr>
		<td>7</td>
		<td>Dr. Rohtash&nbsp;&nbsp;&nbsp;&nbsp; S/o Sh. Bhim Singh</td>
		<td>Asstt. Professor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>14.01.2023</td>
		<td>7082677432</td>
		<td>Education</td>
		</tr>
		<tr>
		<td>8</td>
		<td>Ms. Pooja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Ashok Kumar</td>
		<td>Junior Librarian</td>
		<td>18.03.2023</td>
		<td>8685848344</td>
		<td>&hellip;&hellip;</td>
		</tr>
		<tr>
		<td>9</td>
		<td>Mr. Muninder&nbsp; D/o Sh. Om Parkash</td>
		<td>Data Entry Operator</td>
		<td>18.03.2023</td>
		<td>9991366441</td>
		<td>&hellip;&hellip;</td>
		</tr>
		<tr>
		<td>10</td>
		<td>Mr. Manoj&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; S/o Sh. Narang</td>
		<td>Peon</td>
		<td>24.04.2023</td>
		<td>7497005353</td>
		<td>&hellip;&hellip;</td>
		</tr>
		<tr>
		<td>11</td>
		<td>Mr. Narender&nbsp; S/o Sh. Ramniwas</td>
		<td>Sweeper</td>
		<td>24.04.2023</td>
		<td>9992076450</td>
		<td>&hellip;&hellip;</td>
		</tr>
		<tr>
		<td>12</td>
		<td>Mrs. Savita&nbsp;&nbsp;&nbsp;&nbsp; D/o Sh. Shiv Kumar Bhyana</td>
		<td>Peon</td>
		<td>07.09.2019</td>
		<td>8168760587</td>
		<td>&hellip;&hellip;</td>
		</tr>
		<tr>
		<td>13</td>
		<td>Mr. Amarjeet&nbsp; S/o Sh. Kitab Singh</td>
		<td>Chowkidar</td>
		<td>01.10.2019</td>
		<td>7056221308</td>
		<td>&hellip;&hellip;</td>
		</tr>
		</tbody>
		</table>
  		<table class="table" border="2" style="font-size:20px">

  			<tbody>
			
			<tr><td><p align="center"><strong><a href="{{ route('front.faculty.approval.leter') }}">Approval Letter</a></strong></p></td></tr>
			
  			<tr>

  				<td>

  					<table border="1" width="851">

  						<tbody><tr>
							<td width="200"><b><font size="4" color="#008000">Name </font></b></td>
  							<td width="100"><b><font size="4" color="#008000">Designation</font></b></td>
  							<td width="300"><b><font size="4" color="#008000">Qualification</font></b></td>
  							<td width="100"><b><font size="4" color="#008000">&nbsp;</font></b></td>
  							<td width="100"><b><font size="4" color="#008000">&nbsp;</font></b></td>
  							<td width="131"><b><font size="4" color="#008000">&nbsp;</font></b></td>
  						</tr>

  						<tr>
  							<td><a href="{{ route('front.faculty.profile1') }}">Dr. Surender Kumar</a></td>
							<td><strong>Principal</strong></td>
							<td>Ph.D (Edu), B.Ed., M.Ed., M.Phil. (Edu.), Net (Edu.), M.A. (Hindi), M.A. (His.), M.A. (Pol. Sci.), M.A. (Eng.)</td>
							<td><a href="{{ route('front.faculty.affidavit1') }}">Affidavit</a></td>
							<td><a href="{{ route('front.faculty.Joining1') }}">Joining / Proceeding</a></td>
							<td>&nbsp;</td>
  						</tr>

						<tr>
  							<td><a href="{{ route('front.faculty.profile2') }}">Mrs. Renu Swami</a></td>
							<td>Lecturer in Hindi</td>
							<td>M.A., M.Ed., M.Phil. (Edu)</td>
							<td><a href="{{ route('front.faculty.affidavit2') }}">Affidavit</a></td>
							<td><a href="{{ route('front.faculty.Joining2') }}">Joining / Proceeding</a></td>
							<td><a href="{{ route('front.faculty.Appointment2') }}">Appointment Letter</a></td>
  						</tr>

  						<tr>

  							<td><a href="{{ route('front.faculty.profile3') }}">Dr. Seema Taneja</a></td>

							<td>Lecturer in Education</td>

							<td>B.Ed., M.A., M.Ed., Ph.D. (Edu)</td>

							<td><a href="{{ route('front.faculty.affidavit3') }}">Affidavit</a></td>

							<td><a href="{{ route('front.faculty.Joining3') }}">Joining / Proceeding</a></td>
							<td><a href="{{ route('front.faculty.Appointment3') }}">Appointment Letter</a></td>
  						</tr>

						<tr>

  							<td><a href="{{ route('front.faculty.profile4') }}">Mrs. Suman Arora</a></td>

							<td>Lecturer in Teaching of Mathematics</td>

							<td>B.Ed., M.A., M.Ed., M.Phil. (Edu)</td>

							<td><a href="{{ route('front.faculty.affidavit4') }}">Affidavit</a></td>

							<td><a href="{{ route('front.faculty.Joining4') }}">Joining / Proceeding</a></td>
							<td><a href="{{ route('front.faculty.Appointment4') }}">Appointment Letter</a></td>
  						</tr>

						<tr>

  							<td><a href="{{ route('front.faculty.profile5') }}">Mrs. Kanchan Kochar</a></td>

							<td>Lecturer in Commerce</td>

							<td>M.Com., B.Ed., M.Ed., M.Phill. (Comm.), M.Phill. (Edu.)</td>

							<td><a href="{{ route('front.faculty.affidavit5') }}">Affidavit</a></td>

							<td><a href="{{ route('front.faculty.Joining5') }}">Joining / Proceeding</a></td>
							<td><a href="{{ route('front.faculty.Appointment5') }}">Appointment Letter</a></td>

  						</tr>

						<tr>

  							<td><a href="{{ route('front.faculty.profile6') }}">Mr. Naveen Kumar</a></td>

							<td>Lecturer in English</td>

							<td>NET(EDU), B.Ed., M.A. (Eng.), M.Ed., M.Phil. (Eng.)</td>

							<td><a href="{{ route('front.faculty.affidavit6') }}">Affidavit</a></td>

							<td><a href="{{ route('front.faculty.Joining6') }}">Joining / Proceeding</a></td>
							<td><a href="{{ route('front.faculty.Appointment6') }}">Appointment Letter</a></td>
  						</tr>


  					</tbody></table>

  				</td>

  			</tr>

  			<tr>

  				<td>

  					<p align="center"><b><font color="#800000">Other Staff

                    </font>

  				    </b>

  				</p></td>

  			</tr>

  			<tr>

  				<td>

  					<table border="1" width="851">

  						<tbody><tr>

  							<td width="335">

  								<b><font size="4" color="#008000">Name </font></b>

  							</td>

  							<td width="260">

  								<b><font size="4" color="#008000">Designation

                                </font></b>

  							</td>

  							<td width="356">

  								<b><font size="4" color="#008000">Qualification

                                </font></b>

  							</td>

  						</tr>

  						<tr>
  							<td><a href="#">Pooja Rani</a></td>
							<td>Librarian</td>
							<td>B.Lib., M.Lib.</td>
  						</tr>

  						<tr>

  							<td width="335"><a href="#">Maninder</a></td>

							<td width="460">Clerk</td>

							<td width="356">.</td>

  						</tr>

  						

  						<tr>

  							<td width="335"><a href="#">Sunil</a></td>

							<td width="460">Peon</td>

							<td width="356">.</td>

  						</tr>

  						<tr>

  							<td width="335"><a href="#">Shabnam</a></td>

							<td width="460">Peon</td>

							<td width="356">.</td>

  						</tr>

  						<tr>

  							<td width="335"><a href="#">Ram Snehi</a></td>

							<td width="460">Mali</td>

							<td width="356">.</td>

  						</tr>

  						<tr>

  							<td width="335"><a href="#">Laxman</a></td>

							<td width="460">Sweeper</td>

							<td width="356">.</td>

  						</tr>

  						

  					</tbody></table>

  				</td>

  			</tr>

  			

  		</tbody></table>

  	
	</div>
@endsection

		