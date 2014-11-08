
@extends('layouts.defaultIndex')
@include ('includes.menu')
@section('content')
  @if(Session::has('message'))
    <center> 	
	<div class="alert alert-{{ Session::get('class') }}" > <h3> <font color="white"> {{ Session::get('message')}} </font> </div>
 @endif  

<div id="content">
  <table width="100%" height="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="middle"><img align="center" src="img/logo/logo.png" alt="goldentour"  border=0 > <br>
      </td>
    </tr>
  </table>
</div>




