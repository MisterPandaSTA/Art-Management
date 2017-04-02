<?php

if(isset($_SESSION['id']))
{	
	
	function showPage ($texte) 
	{
		echo $texte ;
	}

	function showDesc ($desc)
	{
    	echo $desc ;
	}


?>
<body>
	<div class="fixe">
		<div class="logotop">
			<img src="images/test2.svg" class="logo_sidebar"></img>
			<div class="topbar">
				<h2><?php $h1 = showPage($texte) ; ?></h2>
				<p><?php $p = showDesc($desc) ; ?></p>
			</div>
		</div>	


		<div class="sidebar">	
			
			<div id="wrapper" class="active">
				<div class="btn-menu">
				  	<ul class="" id="sidebar_menu">
				        <li class="sidebar-brand"><a id="menu-toggle" href="#"><span id="main_icon" class="fa fa-bars"></span></a></li>
				    </ul>
				</div>
			        <div id="sidebar-wrapper">    
			<!-- <div class="sidenav"> -->
				
						<ul class="ul_sidebar">
							<li class="sidebar-brand"><a href="dashboard.php"><span class="fa fa-tachometer"></span>Dashboard</a></li>
							<li class="sidebar-brand"><a href="exposition.php"><span class="fa fa-calendar"></span>Expositions</a></li>
							<li class="sidebar-brand"><a href="artiste.php"><span class="fa fa-camera"></span>Artistes</a></li>
							<li class="sidebar-brand"><a href="oeuvre.php"><span class="fa fa-picture-o"></span>Oeuvres</a></li>
							<!-- <li class="sidebar-brand"><a href="statistique.php"><span class="fa fa-bar-chart"></span>Statistiques</a></li> -->
						<?php

						if($_SESSION['permission'] == 'admin' )
						{
						?>
							<li class="sidebar-brand"><a href="gestion_user.php"><span class="fa fa-users"></span>Utilisateurs</a></li>
							
						<?php
						}

						?>
						</ul>
						<ul class="ul_sidebar btn-profil-disco">
							<li class="sidebar-brand"><a href="user.php"><span class="fa fa-user"></span>Profil</a></li>
							<li class="sidebar-brand"><a href="logout.php"><span class="fa fa-sign-out"></span>Déconnexion</a></li>
						</ul>
					</div>
				</div>	
			</div>
		</div>
	</div>	
<?php
}

/*





 




*/
?>