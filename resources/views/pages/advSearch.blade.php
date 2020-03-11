<!DOCTYPE html>
<html>
<head>
<title>Search functionality - justLaravel.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
				 placeholder="Search by Album name or Artist name "><samp class="input-group-btn">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
					
	
					{{-- <table style="font-size: 20px">
							<tr>
						    <td colspan="2" style="border-bottom: none " align="right" ><h2 align="center"> Advanced Search </h2><hr></td></tr>
                            <tr>
							<td style="border-bottom: none " align="right" >Album Nme:&nbsp;&nbsp;</td><td style="border-bottom: none"><input type="text" class="form-control" name="q"
								placeholder="Search by Albums "></td></tr>
							<tr ><td style="border-bottom: none" align="right" >Artist Name:&nbsp;&nbsp;</td><td style="border-bottom: none"><input type="text" class="form-control" name="ar"
								placeholder="Search by Artist name"></td></tr>
							<tr ><td style="border-bottom: none" align="right" >Producer:&nbsp;&nbsp;</td><td style="border-bottom: none"><input type="text" class="form-control" name="pr"
								placeholder="Search by producer"></td></tr>
							
							<tr ><td style="border-bottom: none" align="right" >Realeas Date:&nbsp;&nbsp;</td><td style="border-bottom: none"><select name="rd" class="form-control">
								
								<option value="this_week" >this week</option>
								<option value="this_month" >this month</option>
								<option value="this_year" >this year</option>
								<option value="more_year" >more than a year</option>
								
		
								</td></tr>
							<tr ><td style="border-bottom: none" align="right" >Gener:&nbsp;&nbsp;</td><td style="border-bottom: none"><select name="gn" class="form-control">
								
								<option value="oldies" >oldies</option>
								<option value="rock" >rock</option>
								<option value="tesita" >tesita </option>
								</td></tr>

							<tr ><td style="border-bottom: none" align="right" >Sort:&nbsp;&nbsp;</td><td style="border-bottom: none"><select name="so" class="form-control">
								
								<option value="Popular" >Popular</option>
								<option value="New realeas" >New Realeas</option>
								</td></tr>
	

								
			
		
						  <tr><td colspan="2" align="center" style="border-bottom: none"><br><button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span></button>
							  <input class="buttons" type="reset" value="Reset" style="margin-left: 200px"></td></tr>
							</table>


						
							
				
						 --}}
					
				</span>
			</div>
		</form>
		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Sample album from </h2>

			<form action="/search" method="POST" role="sort">
				{{ csrf_field() }}
				<div>
					select Gener
					<select name="gn"  >
						<option value="" >choose </option>	
						<option value="oldies" >oldies</option>
						<option value="rock" >rock</option>
						<option value="tesita" >tesita </option>
					</select>
					<input class="buttons" type="submit" name="ok" value="ok"><br><br>
					select Releas Date
					<select name="rd"  >
					<option value="" >choose</option>
					<option value="this_week" >this week</option>
					<option value="this_month" >this month</option>
					<option value="this_year" >this year</option>
					<option value="more_year" >more than a year</option>
					</select>
					<input class="buttons" type="submit" name="okk" value="ok"><br><br>

					<input class="buttons" type="submit" name="po" value="Popular">
					<input class="buttons" type="submit" name="ne" value="New realeas" margin="right">
				</div>
						
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Album Name</th>
						<th>Artist Name</th>
						<th>Producer</th>
						<th>Releas Date</th>
						<th>Gener</th>
						<th>Sort</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $dd)
					<tr>
						<td>{{$dd->Album_Name}}</td>
						<td>{{$dd->Artist_Name}}</td>
						<td>{{$dd->Producer}}</td>
						<td>{{$dd->Releas_Date}}</td>
						<td>{{$dd->Gener}}</td>
						<td>{{$dd->Sort}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>

</body>
</html>