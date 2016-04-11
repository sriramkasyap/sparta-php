        <nav class="white z-depth-0" role="navigation">
            <div class="nav-wrapper">
                <div id="logo">
                    <svg id="white" href="home" class="brand-logo" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="100px" height="48px" viewBox="0 18 360 180" enable-background="new 0 18 360 180" xml:space="preserve"><path fill="#ffffff" d="M343.8 30.8l-86.6 161 -43.5 0 -56.6-90.6c-18.3-27.1-25.1-45.9-62.2-45C65.7 56.9 41.9 79.9 41.9 109.1c0 29.2 23.3 52.9 52.5 52.9 0 0 20 3.2 38-11l17.8 26.9c0 0-30 17.8-62.2 15.5 -50.2-3.6-81.3-34.6-81.3-84.3 0-49.7 40.4-86.4 90.2-86.4 0 0 43.5-0.4 64.8 28.8l75.9 114.3L308.5 30.8 343.8 30.8z"/><path fill="#ffffff" d="M133.2 68.6"/></svg>
                    <a class="brand-logo hide-on-med-and-down"><img id="blue" alt="Cove Venture" src="/img/cv_logo.png" width="129px" height="90px"/></a>
                    <a class="brand-logo hide-on-large-only"><img id="blue" alt="Cove Venture" src="/img/cv_logo.png" width="71px" height="50px"/></a>
                    <!--<a href="/index" class="brand-logo"><img id="white" alt="Cove Venture" src="img/cv_logo_white.png" width="100px" height="48px"/></a>-->
                    
                </div>
                <a href="#" data-activates="mobile-demo" class="button-collapse black-text"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="hide-on-med-and-down">
                    <li class= " <?php echo ($page=='home'? 'active': '');?>"><a class=" main-menu" href="home">Home</a></li>
                    <li class= " <?php echo ($page=='about'? 'active': '');?>"><a class="main-menu" href="about">About</a></li>
                    <li class= " <?php echo ($page=='big data'? 'active': '') ;?>">
                        <a class=" main-menu" href="big-data">Big Data</a>
                        <ul class="fallback card">
                            <li><a class="sub-menu" href="#">Technology Partnerships<i class="fa fa-chevron-right right"></i></a>
                                <ul class="fallback card">
                                    <li class= " <?php echo ($page=='hortonworks'? 'active': '');?>"><a class="sub-menu" href="hortonworks">Hortonworks</a></li>
                                    <li class= " <?php echo ($page=='cloudera'? 'active': '');?>"><a class="sub-menu" href="cloudera">Cloudera</a></li>
                                    <li class= " <?php echo ($page=='mongodb'? 'active': '');?>"><a class="sub-menu" href="mongodb">MongoDB</a></li>
                                    
                                </ul>
                            </li>
                            <li class= " <?php echo ($page=='bigdata hosting'? 'active': '');?>"><a class="sub-menu" href="http://www.yaaji.com" target="_blank">Big Data Hosting</a></li>
                            <li class= " <?php echo ($page=='bigdata trawler'? 'active': '');?>"><a class="sub-menu" href="http://www.bigdatatrawler.com" target="_blank">Big Data Trawler</a></li>
                            <li class= " <?php echo ($page=='consultant on demand'? 'active': '');?>"><a class="sub-menu" href="consultant-on-demand">Consultant on Demand</a></li>
                            <li><a class="sub-menu" href="#">Training<i class="fa fa-chevron-right right"></i></a>
                                <ul class="fallback card">
                                	<li class= " <?php echo ($page=='hortonworks training'? 'active': '');?>"><a class="sub-menu" href="hortonworks-training">Hortonworks</a></li>
                                    <li class= " <?php echo ($page=='cloudera training'? 'active': '');?>"><a class="sub-menu" href="cloudera-training">Cloudera</a></li>
                                    
                                    
                                    <li class= " <?php echo ($page=='mongodb training'? 'active': '');?>"><a class="sub-menu" href="mongodb-training">MongoDB</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class=" main-menu" href="market-research">Market Research</a>
                        <ul class="fallback card">
                            <li class= " <?php echo ($page=='market research'? 'active': '') ;?>"><a class="sub-menu" href="market-research">Research using Big Data</a></li>
                            <li><a class="sub-menu" href="#">Survey To Go<i class="fa fa-chevron-right right"></i></a>
                                <ul class="fallback card">
                                    <li class= " <?php echo ($page=='about STG'? 'active': '') ;?>"><a class="sub-menu" href="survey-to-go">About STG</a></li>
                                    <li class= " <?php echo ($page=='features of STG'? 'active': '') ;?>"><a class="sub-menu" href="stgfeatures">STG's Features</a></li>
                                    <li class= " <?php echo ($page=='FAQ\'s on STG'? 'active': '') ;?>"><a class="sub-menu" href="stgfaq">STG's FAQ</a></li>
                                    <li><a class="sub-menu" href="stgpricing">Pricing<i class="fa fa-chevron-right right"></i></a>
                                    	<ul class="fallback card">
                                            <li class= " <?php echo ($page=='prepaid Plans'? 'active': '') ;?>"><a class="sub-menu" href="prepaid-plans">Prepaid Plans</a></li>
                                            <li class= " <?php echo ($page=='monthly Plans'? 'active': '') ;?>"><a class="sub-menu" href="monthly-plans">Monthly Plans</a></li>
                                            <li class= " <?php echo ($page=='storage Plans'? 'active': '') ;?>"><a class="sub-menu" href="storage-plans">Storage Plans</a></li>
                                		</ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class= " <?php echo ($page=='webogen'? 'active': '') ;?>">
                        <a class=" main-menu" href="#">Application Development</a>
                        <ul class="fallback card">
                           <li><a class="sub-menu" href="website-development">Web Application Development</a></li>
                           <li><a class="sub-menu" href="website-development">Mobile Application Development</a></li>
                           <li><a class="sub-menu" href="website-hosting">Hosting Services</a></li>
                        </ul>
                    </li>
                    <li class= " <?php echo ($page=='careers'? 'active': '') ;?>">
                        <a class=" main-menu" href="careers">Careers</a>
                        <ul class="fallback card">
                            <li class= " <?php echo ($page=='internships'? 'active': '') ;?>"><a class="sub-menu" href="internship">Internships</a></li>
                            <li class= " <?php echo ($page=='full Time Careers'? 'active': '') ;?>"><a class="sub-menu" href="full-time">Full Time Opportunities</a></li>
                        </ul>
                    </li>
                    <li class= " <?php echo ($page=='blog'? 'active': '') ;?>"><a class="main-menu" href="blog">Blog</a></li>
                    <li class= " <?php echo ($page=='contact us'? 'active': '') ;?>"><a class=" main-menu" href="contact">Contact Us</a></li>
                </ul>
<!------------------------------Mobile Compatible Dropdown menu------------------------------------------->
                <ul id="mobile-demo" class="side-nav">
                    <li class= " <?php echo ($page=='home'? 'active': '');?>"><a class=" main-menu" href="index">Home</a></li>
                    <li class= " <?php echo ($page=='about'? 'active': '');?>"><a class="main-menu" href="about">About</a></li>
                    <li class= " <?php echo ($page=='big data'? 'active': '') ;?>">
                        <a class=" main-menu dropdown-button" data-activates="dropdown1" href="#">Big Data</a>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a class="sub-menu" href="hortonworks">Hortonworks</a></li>
                            <li><a class="sub-menu" href="cloudera">Cloudera</a></li>
                            <li><a class="sub-menu" href="mongodb">MongoDB</a></li>
                            <li><a class="sub-menu" href="http://www.yaaji.com" target="_blank">Big Data Hosting</a></li>
                            <li><a class="sub-menu" href="http://www.bigdatatrawler.com" target="_blank">Big Data Trawler</a></li>
                            <li><a class="sub-menu" href="cloudera-training">Cloudera Training</a></li>
                            <li><a class="sub-menu" href="hortonworks-training">Hortonworks Training</a></li>
                            <li><a class="sub-menu" href="mongodb-training">MongoDB Training</a></li>
                        </ul>
                    </li>

                    <!--<li class= " <?php //echo ($page=='internet of things'? 'active': '') ;?>">
                        <a data-activates="dropdown3" class=" main-menu dropdown-button" href="#">Internet Of Things</a>
                        <ul id="dropdown3" class="dropdown-content">
                            <li><a class="sub-menu" href="agriculture">Agriculture</a></li>
                            <li><a class="sub-menu" href="healthcare">Healthcare</a></li>
                            <li><a class="sub-menu" href="retail-management">Retail Management</a></li>
                        </ul>
                    </li>-->
                    <li class= " <?php echo ($page=='market research'? 'active': '') ;?>">
                        <a data-activates="dropdown4" class=" main-menu dropdown-button" href="market-research">Market Research</a>
                        <ul id="dropdown4" class="dropdown-content">
                            <li><a class="sub-menu" href="market-research">Research using Big Data</a></li>
                            <li><a class="sub-menu" href="survey-to-go">About Survey To Go</a></li>
                            <li><a class="sub-menu" href="stgfeatures">STG's Features</a></li>
                            <li><a class="sub-menu" href="stgfaq">STG's FAQ</a></li>
                            <li class= " <?php echo ($page=='prepaid Plans'? 'active': '') ;?>"><a class="sub-menu" href="prepaid-plans">Prepaid Plans</a></li>
                            <li class= " <?php echo ($page=='monthhly Plans'? 'active': '') ;?>"><a class="sub-menu" href="monthly-plans">Monthly Plans</a></li>
                            <li class= " <?php echo ($page=='storage Plans'? 'active': '') ;?>"><a class="sub-menu" href="storage-plans">Storage Plans</a></li>
                        </ul>
                    </li>
                    <li class= " <?php echo ($page=='consultant on demand'? 'active': '') ;?>"><a href="consultant-on-demand">Consultant on Demand</a></li>
                    <li class= " <?php echo ($page=='webogen'? 'active': '') ;?>">
                        <a data-activates="dropdown5" class=" main-menu dropdown-button">Web Technologies</a>
                        <ul id="dropdown5" class="dropdown-content">
                            <li><a class="sub-menu" href="website-development">Web Development</a></li>
                            <li><a class="sub-menu" href="website-hosting">Web Hosting</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class=" main-menu" href="careers">Careers</a>
                        <ul class="fallback card">
                            <li class= " <?php echo ($page=='internships'? 'active': '') ;?>"><a class="sub-menu" href="internship">Internships</a></li>
                            <li class= " <?php echo ($page=='full Time Careers'? 'active': '') ;?>"><a class="sub-menu" href="full-time">Full Time Opportunities</a></li>
                        </ul>
                    </li>
                    <li class= " <?php echo ($page=='blog'? 'active': '') ;?>"><a class="main-menu" href="blog">Blog</a></li>
                    <li class= " <?php echo ($page=='contact us'? 'active': '') ;?>"><a class=" main-menu" href="contact">Contact Us</a></li>
                </ul>
            </div>
        </nav>

