<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $zipFile = 'server.zip';

        $zip =  new ZipArchive();
        if($zip->open($zipFile, ZipArchive::CREATE) !== TRUE) {
            exit("lol this worked");
        }
            
        foreach($_POST['server'] as $jar) {
            $zip->addFile('jar/server/' . $jar . '.jar', 'server.jar');
        }
        
        foreach($_POST['plugin'] as $jar) {
            $zip->addFile('jar/plugins/' . $jar . '.jar', '/plugins/' . $jar . '.jar');
        }
        
        $zip->addFromString('start.bat', 'java -Xms1G -Xmx1G -jar server.jar nogui');
        
        $zip->close();
        
        header('Content-type: application/zip');
	    header('Content-Disposition: attachment; filename="'.basename($zipFile).'"');
	    header("Content-length: " . filesize($zipFile));
	    header("Pragma: no-cache");
	    header("Expires: 0");
        
        ob_clean();
        flush();
        
        readfile($zipFile);
        unlink($zipFile);
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link href="style/master.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
	<title>ServerStart</title>
</head>

<body>
	<div class="header-main" id="1">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<img class="navbar-brand" height="60px" draggable="false" src="https://d1u5p3l4wpay3k.cloudfront.net/minecraft_gamepedia/a/a2/Iron_Pickaxe.png?version=5d66204e8838ad80a836f4ca5a1f5baa" width="50px"> <button aria-controls="navbarText" aria-expanded="false"
				  aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarText" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#1">Home<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#2">Get Started</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#3">Hosting</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href=""><i class="fas fa-heart mr-2"></i>Donate</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="header-text">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>ServerStart</h1>
						<p>We are eliminating the hassle in starting a Minecraft server. Complete with batch installs, tutorials, and discord support, ServerStart is the free resource for getting your server going.</p>
					</div>
					<div class="col-md-6"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="2">
        <form method="POST">
            <div class="semi-title">
                Step 1: <small>Select your JAR</small>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <strong class="faded">Spigot</strong><br>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.7.10" id="spigot_1.7.10"> <label class="form-check-label" for="spigot_1.7.10"><img alt="" height="15" src="img/spigot.png">Spigot 1.7.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.8" id="spigot_1.8"> <label class="form-check-label" for="spigot_1.8"><img alt="" height="15" src="img/spigot.png">Spigot 1.8</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.8" id="spigot_1.9"> <label class="form-check-label" for="spigot_1.9"><img alt="" height="15" src="img/spigot.png">Spigot 1.9</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.10" id="spigot_1.10"> <label class="form-check-label" for="spigot_1.10"><img alt="" height="15" src="img/spigot.png">Spigot 1.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.8" id="spigot_1.12"> <label class="form-check-label" for="spigot_1.12"><img alt="" height="15" src="img/spigot.png">Spigot 1.12</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="spigot_1.8" id="spigot_1.13"> <label class="form-check-label" for="spigot_1.13"><img alt="" height="15" src="img/spigot.png">Spigot 1.13</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong class="faded">CraftBukkit</strong><br>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="bukkit_1.7.10" id="bukkit_1.7.10"> <label class="form-check-label" for="bukkit_1.7.10"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.7.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="bukkit_1.8" id="bukkit_1.8"> <label class="form-check-label" for="bukkit_1.8"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.8</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="bukkit_1.9" id="bukkit_1.9"> <label class="form-check-label" for="bukkit_1.9"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.9</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="bukkit_1.10" id="bukkit_1.10"> <label class="form-check-label" for="bukkit_1.10"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="bukkit_1.12" id="bukkit_1.12"> <label class="form-check-label" for="bukkit_1.12"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.12</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="jar[]" type="checkbox" value="bukkit_1.13" id="bukkit_1.13"> <label class="form-check-label" for="bukkit_1.13"><img alt="" height="15" src="img/bukkit.jpeg">CraftBukkit 1.13</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong class="faded">Vanilla</strong><br>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.7.10" id="vanilla_1.7.10"> <label class="form-check-label" for="vanilla_1.7.10"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.7.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.8" id="vanilla_1.8"> <label class="form-check-label" for="vanilla_1.8"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.8</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.9" id="vanilla_1.9"> <label class="form-check-label" for="vanilla_1.9"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.9</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.10" id="vanilla_1.10"> <label class="form-check-label" for="vanilla_1.10"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.10</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.12" id="vanilla_1.12"> <label class="form-check-label" for="vanilla_1.12"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.12</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input onlyone" name="server[]" type="checkbox" value="vanilla_1.13" id="vanilla_1.13"> <label class="form-check-label" for="vanilla_1.13"><img alt="" height="15" src="img/minecraft.jpg">Vanilla 1.13</label>
                        </div>
                    </div>
                </div>
            </div><br>
            <hr>
            <div class="semi-title">
                Step 2:
                <small>Now add some plugins</small>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <strong class="faded">Our Favorites</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="essentials" type="checkbox" value=""> <label class="form-check-label" for="essentials"><img height="20" src="https://hub.spigotmc.org/jenkins/static/a27f4c7f/images/headshot.png"> Essentials</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="essentials_chat" type="checkbox" value=""> <label class="form-check-label" for="essentials_chat"><img height="20" src="https://hub.spigotmc.org/jenkins/static/a27f4c7f/images/headshot.png"> Essentials Chat</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="essentials_anti_build" type="checkbox" value=""> <label class="form-check-label" for="essentials_anti_build"><img height="20" src="https://hub.spigotmc.org/jenkins/static/a27f4c7f/images/headshot.png"> Essentials Anti-Build</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="essentials_spawn" type="checkbox" value=""> <label class="form-check-label" for="essentials_spawn"><img height="20" src="https://hub.spigotmc.org/jenkins/static/a27f4c7f/images/headshot.png"> Essentials Spawn</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="worldedit" type="checkbox" value=""> <label class="form-check-label" for="worldedit"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/0/327.jpg?1391290736"> AsyncWorldEdit</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="fawe" type="checkbox" value=""> <label class="form-check-label" for="fawe"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/13/13932.jpg?1472269248"> FAWE</label>
                        </div>
                    </div><br>
                    <strong class="faded">Minigames</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="plot_squared" type="checkbox" value=""> <label class="form-check-label" for="plot_squared"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/1/1177.jpg?1436911413"> PlotSquared</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="askyblock" type="checkbox" value=""> <label class="form-check-label" for="askyblock"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/1/1220.jpg?1411397589"> aSkyblock</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="factions" type="checkbox" value=""> <label class="form-check-label" for="factions"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/1/1900.jpg?1457005912"> Factions</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="bedwars" type="checkbox" value=""> <label class="form-check-label" for="bedwars"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/6/6799.jpg?1431011157"> Bedwars</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="kitpvp" type="checkbox" value=""> <label class="form-check-label" for="kitpvp"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/1/1583.jpg?1522150653"> KitPVP</label>
                        </div>
                    </div><br>
                </div>
                <div class="col-md-4">
                    <strong class="faded">Permissions</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="permissions_ex" type="checkbox" value=""> <label class="form-check-label" for="permissions_ex"><img alt="" height="20" src="https://media.forgecdn.net/avatars/thumbnails/65/448/64/64/636162917918103026.png"> PermissionsEX</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="zpermissions" type="checkbox" value=""> <label class="form-check-label" for="zpermissions"><img alt="" height="20" src="https://static.spigotmc.org/styles/spigot/xenresource/resource_icon.png">zPermissions</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="lucky_perms" type="checkbox" value=""> <label class="form-check-label" for="lucky_perms"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/28/28140.jpg?1490821714"> LuckPerms</label>
                        </div>
                    </div><br>
                    <strong class="faded">Fun</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="lib_disguises" type="checkbox" value=""> <label class="form-check-label" for="lib_disguises"><img alt="" height="20" src="https://static.spigotmc.org/styles/spigot/xenresource/resource_icon.png"> Lib's Disguises</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="crates_plus" type="checkbox" value=""> <label class="form-check-label" for="crates_plus"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/5/5018.jpg?1433635493"> CratesPlus</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="chat_feelings" type="checkbox" value=""> <label class="form-check-label" for="chat_feelings"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/12/12987.jpg?1499693511"> ChatFeelings</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="troll_commands" type="checkbox" value=""> <label class="form-check-label" for="troll_commands"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/24/24237.jpg?1499151235"> TrollCommands++</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="epic_pets" type="checkbox" value=""> <label class="form-check-label" for="epic_pets"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/40/40697.jpg?1494443011"> EpicPets</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="cosmic_bosses" type="checkbox" value=""> <label class="form-check-label" for="cosmic_bosses"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/34/34032.jpg?1483151841"> Cosmic Bosses</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="custom_arrow_trails" type="checkbox" value=""> <label class="form-check-label" for="custom_arrow_trails"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/49/49969.jpg?1511588891"> CustomArrowTrails</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="dragon_slayer" type="checkbox" value=""> <label class="form-check-label" for="dragon_slayer"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/36/36250.jpg?1486936200"> DragonSlayer</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="duels" type="checkbox" value=""> <label class="form-check-label" for="duels"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/20/20171.jpg?1458188995"> Duels</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong class="faded">Admin Utilities</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="auth_me" type="checkbox" value=""> <label class="form-check-label" for="auth_me"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/6/6269.jpg?1512144392"> AuthMeReloaded</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="via_version" type="checkbox" value=""> <label class="form-check-label" for="via_version"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/19/19254.jpg?1475607356"> ViaVersion</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="world_guard" type="checkbox" value=""> <label class="form-check-label" for="world_guard"><img alt="" height="20" src="https://media.forgecdn.net/avatars/66/547/636163065897773072.png"> WorldGuard</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="core_protect" type="checkbox" value=""> <label class="form-check-label" for="core_protect"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/8/8631.jpg?1435184042"> CoreProtect</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="anti_proxy" type="checkbox" value=""> <label class="form-check-label" for="anti_proxy"><img alt="" height="20" src="https://static.spigotmc.org/styles/spigot/xenresource/resource_icon.png"> Anti-Proxy</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="command_block" type="checkbox" value=""> <label class="form-check-label" for="command_block"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/40/40886.jpg?1494787796"> CommandBlock</label>
                        </div>
                    </div><br>
                    <strong class="faded">Moderation</strong>
                    <div class="form-check mt-2">
                        <div class="checkbox">
                            <input class="form-check-input" id="chat_control" type="checkbox" value=""> <label class="form-check-label" for="chat_control"><img alt="" height="20" src="https://media.forgecdn.net/avatars/thumbnails/65/448/64/64/636162917918103026.png"> ChatControl</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="advanced_ban" type="checkbox" value=""> <label class="form-check-label" for="advanced_ban"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/8/8695.jpg?1500931390"> AdvancedBan</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="max_bans" type="checkbox" value=""> <label for="max_bans" class="form-check-label"><img src="https://www.spigotmc.org/data/resource_icons/41/41392.jpg?1520937778" height="20" alt=""> MaxBans</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="no_cheat_plus" type="checkbox" value=""> <label class="form-check-label" for="no_cheat_plus"><img alt="" height="20" src="https://www.spigotmc.org/data/resource_icons/0/26.jpg?1437855364"> NoCheatPlus</label>
                        </div>
                        <div class="checkbox">
                            <input class="form-check-input" id="phoenix_anti_cheat" type="checkbox" value=""> <label class="form-check-label" for="phoenix_anti_cheat"><img alt="" height="20" src="https://proxy.spigotmc.org/efc45c2644b98798c370bab57bd9e3e807fda819?url=http%3A%2F%2Fi.imgur.com%2F3MHY1k8.jpg">Phoenix Anti-Cheat</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" class="form-check-input" id="baymax_anti_cheat" value=""> <label for="baymax_anti_cheat" class="form-check-label"><img src="https://www.spigotmc.org/data/resource_icons/43/43972.jpg?1501012632" height="20" alt=""> Baymax Anti-Cheat</label>
                        </div>
                    </div>
                </div>
            </div><br>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="semi-title">
                        Step 3: <small>Download your files</small>
                    </div>
                    <button class="btn-primary btn btn-block" style="width: 25%"><i class="fas fa-download"></i> Download</button>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="semi-title">
                        Are you self hosting your server?
                        <small>Read our tutorials</small>
                    </div>
                    <button class="btn btn-info btn-block" style="width: 25% !important;"><i class="fab fa-readme"></i> Read Now</button>
                    <br>
                </div>
            </div>
        </form>
	</div>

	<div class="header-smaller" id="3">
		<div class="header-text">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>OptNode Hosting</h1>
						<p>OptNode is our choice for <strong>affordable</strong> and <strong>reliable</strong> hosting. With excellent support, 99% uptime guarentee, and a money back guarentee, there is no reason you shouldn't order hosting from OptNode.</p>
						<div class="mt-2">
							<button class="btn btn-outline-light"><i class="fas fa-shopping-cart"></i> Order Now and save 15%</button>
						</div>
					</div>
					<div class="col-md-6 hidden-sm-down">
						<img src="img/optnode.png" alt="OptNode" style="max-height: 200px; width: auto;" class="float-right" draggable="false">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="donate">
		<div class="container 4">
			<div class="header-text">
				<div class="semi-title">
					<h1>Donate</h1>
					<small>ServerStart was created by developers volunteering their time. Help support them.</small>
				</div>
				<br>
				<script src="https://donorbox.org/widget.js" paypalExpress="false"></script><iframe src="https://donorbox.org/embed/ServerStart-donations?amount=5&show_content=true&hide_donation_meter=true" height="685px" width="100%" style="max-width:100%; min-width:100%; max-height:none!important" seamless="seamless" name="donorbox"
				  frameborder="0" scrolling="no" allowpaymentrequest></iframe>
			</div>
		</div>
		<br>
	</div>








	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>
	<script>
// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
	</script>
</body>

</html>
