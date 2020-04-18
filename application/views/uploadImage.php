<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset_url();?>css/styles.css">
</head>
<body>
<nav class="navigation">
<div class="navigation__column">
            <a href="<?= site_url('index.php/home/feed') ?>">
                <!-- Master branch comment -->
                <img src="<?php echo asset_url();?>images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action="<?= site_url('index.php/home/search') ?>" method="post">
            <input type="text" placeholder="Search" name="search" >
            </form>
        </div>
    <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item" style="position:relative; bottom:2px;">
                    <a href="<?= site_url('index.php/home/uploadPage') ?>" class="navigation__link">
                    <svg aria-label="New Post" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M31.8 48H16.2c-6.6 0-9.6-1.6-12.1-4C1.6 41.4 0 38.4 0 31.8V16.2C0 9.6 1.6 6.6 4 4.1 6.6 1.6 9.6 0 16.2 0h15.6c6.6 0 9.6 1.6 12.1 4C46.4 6.6 48 9.6 48 16.2v15.6c0 6.6-1.6 9.6-4 12.1-2.6 2.5-5.6 4.1-12.2 4.1zM16.2 3C10 3 7.8 4.6 6.1 6.2 4.6 7.8 3 10 3 16.2v15.6c0 6.2 1.6 8.4 3.2 10.1 1.6 1.6 3.8 3.1 10 3.1h15.6c6.2 0 8.4-1.6 10.1-3.2 1.6-1.6 3.1-3.8 3.1-10V16.2c0-6.2-1.6-8.4-3.2-10.1C40.2 4.6 38 3 31.8 3H16.2z"></path><path d="M36.3 25.5H11.7c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5h24.6c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5z"></path><path d="M24 37.8c-.8 0-1.5-.7-1.5-1.5V11.7c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5v24.6c0 .8-.7 1.5-1.5 1.5z"></path></svg>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="<?= site_url('index.php/home/explore') ?>" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="http://localhost/instagram/index.php/home/profile" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="col-lg-6 mx-auto">
<form action="<?= site_url('index.php/home/uploadPhoto') ?>" method="post" enctype="multipart/form-data"> 
<!-- multipart untuk upload foto  -->

<div class="form-group">
			<label style="margin-bottom:12px;">Caption</label>
			<textarea name="caption" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label style="margin-bottom:12px;">Upload Gambar</label>
			<input type="file" class="btn form-control-file" name="image">
		</div>
		<div class="form-group">
			<input type="submit" name="kirim" class="btn btn-success" value="Upload">
		</div>
</form>
</div>
</body>
</html>