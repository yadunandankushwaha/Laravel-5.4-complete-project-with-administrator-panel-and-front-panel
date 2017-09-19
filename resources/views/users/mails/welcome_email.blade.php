Hi {{ $user->name }}
<br />

<div>
<p>Thank you for signup with, to activate your account please click on the below link.</p><br />.
http://localhost/admintheme/confirmation/<?php echo $user->remember_token; ?>
</div>