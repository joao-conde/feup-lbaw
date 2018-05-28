<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
	a {
		position: relative;
		display: inline-block;
		vertical-align: top;
		height: 36px;
		line-height: 35px;
		padding: 0 20px;
		font-size: 13px;
		color: white;
		text-align: center;
		text-decoration: none;
		border: 1px solid;
		border-radius: 2px;
		cursor: pointer;
		background: #1097e6;
		border-color: #1097e7;
	}
	
</style>
</head>
<body>

	<h2>MusicBox - A social network for musicians</h2>

	<p>A password recovery has been requested for this account. If you didn't request it, ignore this email, if you did, click the button below.</p>

	<a href="{{ $link = url('password/reset', $token) }}">Reset Password</a>

</body>
</html>