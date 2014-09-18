@extends('layouts.defaultIndex')
@section('content')
@include ('includes.menu')
	

<div id="content">
  <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="middle"><img align="center" src="img/logo/logo.png" alt="goldentour"  border=0 > <br>
      <img align="center" src="img/logo/bienvenido2.png" alt="goldentour"  border=0 ></td>
      
    </tr>
  
  </table>
</div> 

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif

						
