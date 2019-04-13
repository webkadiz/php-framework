<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo $title ?></title>
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
	</head>

	<body>

		<div class="page">
			<header class="header">
				<div class="header__bg"></div>

				<div class="container">
					<div class="menu">
						<div class="menu__left">
							<div class="logo">
								<img src="<?php echo img('logo.svg') ?>" alt="">
							</div>
							<nav class="nav"> <a class="nav__item" href="#">главная</a>
								<a class="nav__item" href="#">обо мне</a>
								<a class="nav__item" href="#">контакты</a>
								<a class="nav__item" href="#">теги</a>
							</nav>
						</div>
						<!-- menu__nav -->
						<div class="menu__right">
							<div class="search search_theme_white">
								<i class="icon-search"></i>
							</div>
							<div class="button-acute button-acute_theme_white button-acute_size_m
						menu__right-margin">
								<a href="/register.html" class="button-acute__inner">войти</a>
							</div>
							<div class="button-acute button-acute_theme_yellow
						button-acute_size_m">
								<a href="/register.html" class=" button-acute__inner">регистрация</a>
							</div>
						</div>
						<!-- menu__right -->
					</div>
				</div>
				<!-- container -->

			</header>
			<main class="main index">
				<div class="container">
					<div class="main__inner">
						<article class="article">

							<?php echo $content ?>
						</article>
						<aside class="sidebar">
							<div class="sidebar__item sidebar__category">
								<div class="slashed">
									<div class="slashed__top">
										<div class="slashed__top-content">категории</div>
									</div>
									<div class="slashed__bottom">
										<div class="slashed__bottom-content">категории</div>
									</div>
								</div>
								<nav class="sidebar-list sidebar__category-list">
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">веб разработка</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+37</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">мобильная разработка</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+2</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">desktop разработка</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_negative">-47</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">нискоуровневая разработка</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+3</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">разработка сетевых демонов</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_negative">-122</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">высоконагруженная разраб...</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+65</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">базы данных</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+77</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">php</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_negative">-31</div>
										</div>
									</a>
									<a href="#" class="sidebar-list__item sidebar__list-item">
										<div class="sidebar-list__title">javascript</div>
										<div class="sidebar-list__info">
											<div class="sidebar-list__rate sidebar-list__rate_positive">+40</div>
										</div>
									</a>
								</nav>
							</div>
							<div class="sidebar__item  sidebar__reading">
								<div class="slashed">
									<div class="slashed__top">
										<div class="slashed__top-content">сейчас читают</div>
									</div>
									<div class="slashed__bottom">
										<div class="slashed__bottom-content">сейчас читают</div>
									</div>
								</div>
								<nav class="sidebar__reading-list sidebar-list sidebar-list_direct_column">
									<a class="sidebar__list-item sidebar-list__item" href="#">
										<h2 class="sidebar-list__title">Новое открытие в сфере IT создали новый язык</h2>
										<div class="box-icon  sidebar-list__box-icon box-icon_theme_active">
											<div class="box-icon__item">
												<i class="icon-eye box-icon__icon"></i>
												<div class="box-icon__number">6</div>
											</div>
											<div class="box-icon__item">
												<i class="icon-comments box-icon__icon"></i>
												<div class="box-icon__number">42</div>
											</div>
										</div>
									</a>
									<a href="#" class="sidebar__list-item sidebar-list__item">
										<h2 class="sidebar-list__title">Новое открытие в сфере IT создали новый язык</h2>
										<div class="box-icon sidebar-list__box-icon box-icon_theme_active">
											<div class="box-icon__item">
												<i class="icon-eye box-icon__icon"></i>
												<div class="box-icon__number">12</div>
											</div>
											<div class="box-icon__item">
												<i class="icon-comments box-icon__icon"></i>
												<div class="box-icon__number">666</div>
											</div>
										</div>
									</a>
									<a href="#" class="sidebar__list-item sidebar-list__item">
										<h2 class="sidebar-list__title">Новое открытие в сфере IT создали новый язык</h2>
										<div class="box-icon  sidebar-list__box-icon box-icon_theme_active">
											<div class="box-icon__item">
												<i class="icon-eye box-icon__icon"></i>
												<div class="box-icon__number">1</div>
											</div>
											<div class="box-icon__item">
												<i class="icon-comments box-icon__icon"></i>
												<div class="box-icon__number">3455</div>
											</div>
										</div>
									</a>
								</nav>
							</div>
							<div class="author">
								<div class="slashed">
									<div class="slashed__top">
										<div class="slashed__top-content">авторы</div>
									</div>
									<div class="slashed__bottom">
										<div class="slashed__bottom-content">авторы</div>
									</div>
								</div>
								<nav>
									<ul class="author__list">
										<li>
											<a href="#" class="author__item" style="--rating: 64%">
												<div class="author__info">
													<img src="/src/img/user2.svg" alt="" class="author__image" width="42" height="42">
													<div>
														<div class="author__name">Ткаченко Владислав</div>
														<div class="author__rating">1233</div>
													</div>
												</div>
												<div class="author__subscribe">
													<i class="icon-follower"></i>
													<div class="author__number">567</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#" class="author__item" style="--rating: 80%">
												<div class="author__info">
													<img src="/src/img/user1.svg" alt="" class="author__image" width="42" height="42">
													<div>
														<div class="author__name">Ольга Павловна</div>
														<div class="author__rating">55555555555555</div>
													</div>
												</div>
												<div class="author__subscribe">
													<i class="icon-follower"></i>
													<div class="author__number">2</div>
												</div>
											</a>
										</li>
										<li>
											<a href="#" class="author__item" style="--rating: 40%">
												<div class="author__info">
													<img src="/src/img/user2.svg" alt="" class="author__image" width="42" height="42">
													<div>
														<div class="author__name">Плотников Владислав</div>
														<div class="author__rating">65</div>
													</div>
												</div>
												<div class="author__subscribe">
													<i class="icon-follower"></i>
													<div class="author__number">88</div>
												</div>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</aside>
					</div>
					<!-- container -->
				</div>
			</main>
			<footer class="subfooter">
				<div class="container">
					<div class="subfooter__inner">
						<div class="watching">
							<div class="slashed">
								<div class="slashed__top">
									<div class="slashed__top-content">самое читаемое</div>
								</div>
								<div class="slashed__bottom">
									<div class="slashed__bottom-content">самое читаемое</div>
								</div>
							</div>
							<nav>
								<div class="subswitch watching__subfilter">
									<div class="subswitch__item subswitch__item-active">Сутки</div>
									<div class="subswitch__item">Неделя</div>
									<div class="subswitch__item">Месяц</div>
								</div>
								<ul class="watching__list">
									<li>
										<a href="#" class="watching__item">
											<div class="watching__date">15:14 1 seotember</div>
											<div class="watching__title">i do not know that reading because i stupid</div>
											<div class="watching__icons">
												<div class="watching__icon">
													<i class="icon-eye"></i>
													<div class="watching__number">65</div>
												</div>
												<div class="watching__icon">
													<i class="icon-comments"></i>
													<div class="watching__number">1233</div>
												</div>
												<div class="watching__icon">
													<i class="icon-bookmark"></i>
													<div class="watching__number">5</div>
												</div>
												<div class="watching__icon">
													<div class="watching__rating">+35</div>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="watching__item">
											<div class="watching__date">12:55 6 march</div>
											<div class="watching__title">how your name my name is vlad and you</div>
											<div class="watching__icons">
												<div class="watching__icon">
													<i class="icon-eye"></i>
													<div class="watching__number">45</div>
												</div>
												<div class="watching__icon">
													<i class="icon-comments"></i>
													<div class="watching__number">555</div>
												</div>
												<div class="watching__icon">
													<i class="icon-bookmark"></i>
													<div class="watching__number">12</div>
												</div>
												<div class="watching__icon">
													<div class="watching__rating">-12</div>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#" class="watching__item">
											<div class="watching__date">22:23 22 february</div>
											<div class="watching__title">i am arrogant and modest and quiet and weak and confident</div>
											<div class="watching__icons">
												<div class="watching__icon">
													<i class="icon-eye"></i>
													<div class="watching__number">666</div>
												</div>
												<div class="watching__icon">
													<i class="icon-comments"></i>
													<div class="watching__number">43</div>
												</div>
												<div class="watching__icon">
													<i class="icon-bookmark"></i>
													<div class="watching__number">89</div>
												</div>
												<div class="watching__icon">
													<div class="watching__rating">-23</div>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</nav>
						</div>
						<div class="reclame">реклама</div>
					</div>
				</div>
			</footer>
			<footer class="footer">
				<div class="container">
					<div class="footer__inner">
						<nav class="footer__navigation">
							<div class="footer__title">навигация</div>
							<ul class="footer__list">
								<li><a href="#" class="footer__item">главная</a></li>
								<li><a href="#" class="footer__item">контакты</a></li>
								<li><a href="#" class="footer__item">обо мне</a></li>
								<li><a href="#" class="footer__item">теги</a></li>
							</ul>
						</nav>
						<nav class="footer__navigation">
							<div class="footer__title">категории</div>
							<ul class="footer__list">
								<li><a href="#" class="footer__item">веб разработка</a></li>
								<li><a href="#" class="footer__item">мобильная разработка</a></li>
								<li><a href="#" class="footer__item">нискоуровневая разработка</a></li>
								<li><a href="#" class="footer__item">desktop разработка</a></li>
								<li><a href="#" class="footer__item">разработка сетевых демонов</a></li>
								<li><a href="#" class="footer__item">высоконагруженная разраб...</a></li>
								<li><a href="#" class="footer__item">базы данных</a></li>
								<li><a href="#" class="footer__item">php</a></li>
								<li><a href="#" class="footer__item">javascript</a></li>
							</ul>
						</nav>
						<nav class="footer__navigation">
							<div class="footer__title">информация</div>
							<ul class="footer__list">
								<li><a href="#" class="footer__item">правила</a></li>
								<li><a href="#" class="footer__item">помощь</a></li>
								<li><a href="#" class="footer__item">документация</a></li>
								<li><a href="#" class="footer__item">соглашение</a></li>
								<li><a href="#" class="footer__item">конфиденсальность</a></li>
							</ul>
						</nav>
						<div class="signature">
							<img src="<?php echo img('signature.png') ?>" alt="">
							<button class="button-press"><i class="icon-mail-alt"></i> webkadiz@gmail.com</button>
						</div>
					</div>
				</div>
			</footer>
			<!-- content -->
		</div>

		<!-- <script src="build/vendors~index~post~register~write.js"></script>
	<script src="build/index~post~register~write.js"></script>   -->
		<?php echo $js ?>


	</body>

</html>