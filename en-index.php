<?php

    include('db.php');

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //get data from DB
    $query1 = "SELECT * FROM tb_careers1_230 WHERE category='Information Systems' AND lang='eng'";
    $query2 = "SELECT * FROM tb_careers1_230 WHERE category='Engineering' AND lang='eng'";
    //$queryNews = "SELECT header,id FROM `tb_news_230` WHERE lang='heb' ORDER BY id";

    function getCareers($result) {
        $count = 0;

        //use return data (if any)
        while($row = mysqli_fetch_assoc($result)) {
            //results are in associative array. keys are cols names
            //output data from each row
            $count++;
            echo "<article class=\"job\">";
            echo "<span>" . $count . "</span>";
            echo "<span>" . "Job category | " . "</span>" . "<span>" . $row["category"] . "</span>";
            echo "<span>" . "Job title | " . "</span>" . "<span>" . $row["title"] . "</span>";
            echo "<br>";
            if ($row["responsibilities"] != null) {
                echo "<span class=\"job-desc\">Responsibilities | </span>";
                echo "<p class=\"job-desc-val\">" . $row["responsibilities"] . "</p><br>";
            }
            echo "<span class=\"job-desc\">Qualifications | </span>";
            echo "<p class=\"job-desc-val\">" . $row["qualifications"] . "</p>";
            echo "</article>";
        }

        //release returned data
        mysqli_free_result($result);
    }

    function getNewsList ($result) {
        echo "<ul id=\"articles\">";

        //use return data (if any)
        while ($row = mysqli_fetch_assoc($result)) {
            //results are in associative array. keys are cols names
            //output data from each row
            echo "<li>";
            echo "<a href=\"" . $row["id"] . "\"" . " id=\"myBtn\">";
            echo $row["header"];
            echo "</a></li>";
        }

        echo "</ul>";

        //release returned data
        mysqli_free_result($result);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>GolanTelecom-en</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet"  href="includes/style.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="includes/scripts.js"></script>
</head>
<body>
<div id="en-version" class="wrapper">
    <header>
        <a class="logo" href="#"></a>
        <a class="lang" href="index.php"><b>עברית</b></a>
    </header>
    <section id="golan-telecom-top">
        <h1>Golan Telecom,new player in the cellular world</h1>
        <span class="side-line"></span>
        <span class="title-icon"></span>
        <article>
            <p><b>"Entry of another cellular operator will increase competition and reduce consumer prices"</b></p>
            <span>Minister of Communications Moshe Kahlon, July 2011</span>
            <p><b>We picked up the gauntlet! <br>
                    We're on the way to leading a real change in cellular</b></p>
            <p><b>Would you like to take part in the <span>revolution?</span></b></p>
            <a href="#contact-us">Press here</a>
        </article>
    </section>
    <nav>
        <ul id="nav-list">
            <li><p></p><a href="#what-we-do">What are we doing?</a></li>
            <li><p></p><a href="#who-are-we">Who we are?</a></li>
            <li><p></p><a href="#when-we-start">When we'll start operating?</a></li>
            <li><p></p><a href="#careers">Careers</a></li>
            <li><p></p><a href="#contact-us">Contact Us</a></li>
        </ul>
    </nav>
    <span class="boundary-line"></span>
    <div class="clear"></div>
    <aside>
        <h5>Updates and RSS</h5>
        <span></span>
        <h5>From the newspaper</h5>
        <?php
        $data = selectQuery($connection, $queryNews);

        if(isset($data)) {
            getNewsList($data);
        }
        ?>
        <!--
        <ul id="articles">
        <a href='book.html?bookId=" + this.id + "
            <li><a href="#article01" id="myBtn">GT submitted a tender</a></li>
            <li><a href="#article02">Delivery of GT Guarantee</a></li>
            <li><a href="#article03">Internal roaming agreement</a></li>
            <li><a href="#article04">Golan Telecom's prefix</a></li>
        </ul>-->
        <span class="close"></span>
        <section id="myModal" class="modal">
            <article id="article01" class="modal-content">
             <!--   <h4>The Golan Telecom Group, headed by entrepreneur and CEO Michael Golan, today submitted its bid in the cellular frequencies tender of the Ministry of Communications</h4><br>
                <p>The Golan Telecom Group, headed by entrepreneur and CEO Michael Golan, today submitted its bid in the cellular frequencies tender of the Ministry of Communications, in which two new operators will be selected.<br>
                    9 The tender boxes of Golan Telecom were submitted to the Tender Committee of the Ministry of Communications in Jerusalem this afternoon by Oren Most, who heads the tender team, Adv. Nitzan Averbach of Zellermayer-Pelossof and Shai Duidor, of the engineering team.</p><br>
                <h4>Michael Golan :</h4>
                <p>"The Golan Telecom Group, my partners, Xavier Nir, the controlling shareholder of ILIAD, the Priant brothers and the tender team and the way, are very excited today by the unique status that enables us to compete in the tender for receiving a new cellular license in Israel.
                    We thank the Ministry of Communications and its head for opening up the Israeli communications market to free competition and bringing the news and revolution that every media consumer so desires. "
                    "We will do our utmost to leverage the vast knowledge and experience of our group for the benefit of the consumer and the cellular market in Israel.<br>
                    "On behalf of the group of investors and shareholders, senior management and partners in Golan Telecom, we would like to thank the Ministry of Communications and its director, Moshe Kahlon,
                    for opening the window to a new, fascinating and daring world of communication that will undoubtedly change the Israeli communications world, "We hope that this is the first step to free competition and a significant price reduction for the consumer market."
                </p>
                <br>
                <h4>Oren Most :</h4>
                <p>"We wake up the next morning, and the world of communications in Israel will not be the same as yesterday." The locomotive began its journey to the destination - a desired change in the communications and cellular maps in Israel for the benefit of consumers and for them.
                    I am proud to be part of this rare group of entrepreneurs and managers, headed by Michael Golan and Xavier Nir, who have a fantastic record in the establishment and management of ILIAD.<br>
                    Under the FREE brand, ILIAD provides millions of French people with a generous and varied service package that has caused its competitors to reduce prices by 40% !!!,
                    In Israel, which was a global pioneer in the mobile personal communications revolution in the mid-1990s, the competition that once characterized the cellular market is lacking. The frequency tender will stimulate and generate competition for the welfare of consumers, the quality of life and the benefit of the economy as a whole.<br>
                </p>-->
            </article>
            <article id="article02" class="modal-content">
                <!--<h4>Golan Telecom completes all its obligations in advance: <br> it has submitted the bank guarantee to the Ministry of Communications
                    In the amount of NIS 360 million from Mizrahi Tefahot Bank
                </h4>-->
               <!-- <h6>The company has begun recruiting key personnel for the establishment of technology, engineering and information systems infrastructures
                    and invites candidates to send CVs to HR@golantelecom.co.il
                </h6>
                <br>
                <p>
                    <b>Golan Telecom completed all its obligations according to the frequencies tender and today submitted to the Minister of Communications, MK Moshe Kahlon, the bank guarantee in the amount of NIS 360 million, at a short ceremony held in his office.</b>
                </p>
                <p>
                    With the delivery of the bank guarantee as required, <b>Golan Telecom</b> is in compliance with all the requirements set by the Ministry of Communications for the tender, initiated by Minister Moshe Kahlon in order to stimulate the cellular market by adding new competitors.
                    <b>Golan Telecom</b> wishes to thank the Minister of Communications, MK Moshe Kahlon, the Chairman of the Tenders Committee, Dr. Assaf Cohen, and the members of the committee and the professional staff of the Ministry of Communications for the revolutionary move aimed at the benefit of Israeli consumers and their well-being.
                </p>
                <p>
                    <b>The Company is confident that this policy of the Ministry of Communications to enhance competition in the market will continue and will ensure the success of the new competitors. </b>
                    <br>
                    <b>Golan Telecom's</b> vision is to bring a cellular consumer revolution to the Israeli market.
                    The shareholders and managers of the group have already proven their ability in the consumer revolutions that have led and led to the benefit of the media customers in France and Israel.
                    The core building blocks of <b>Golan Telecom</b> include increased competitiveness, innovative technology, advanced products, quality service and above all a dramatic drop in consumer prices through simple and clear packages to the customer.
                </p>
                <p>
                    <b>The bank guarantee given to the Ministry of Communications today was issued by</b> Mizrahi Tefahot Bank.
                    Golan Telecom thanks the Bank's management and members of the team who demonstrated professionalism, agility and efficiency while expressing confidence in the future of the Israeli cellular market and Golan Telecom as a new cellular operator.
                    Thanks also to the other banks, which responded with great speed and service, to the need of Golan Telecom to present a bank guarantee to the Ministry of Communications. These banks will undoubtedly constitute an important element in fulfilling the Bank's banking needs in the future.
                    Attorney Patrick Ben Zimra and his team represented Golan Telecom in an agreement with Mizrahi Tefahot Bank.
                    <b>Golan Telecom</b> has begun recruiting key employees in the fields of engineering, technology and information systems to meet the challenge of building Israel's next cellular network. Candidates are invited to send an e-mail to HR@golantelecom.co.il
                    <br>
                    Golan Communications thanks all those Israelis who have demonstrated their support in the past few weeks and we will meet them in the market in 2012.
                </p>-->
            </article>
            <article id="article03" class="modal-content">
      <!--          <h4>Golan Telecom, the new cellular operator, has signed the agreement
                    An internal roaming agreement with Cellcom
                </h4>
                <br><br>
                <p>
                    Golan Telecom, the new cellular operator, has signed an internal roaming agreement with <b>Cellcom.</b>
                    The domestic roaming agreement will enable <b>Golan Telecom</b> customers to enjoy nationwide coverage at the start of the company's operations, planned for 2012.<br><br>
                    The cooperation between Golan Telecom and Cellcom brings into effect the Ministry of Communications' policy of allowing new cellular operators to enter the reality that the licensing process of new base sites is long and complex, and constitutes a barrier to entry into the market.<br><br>
                    The agreement signed between the two companies also includes cellular sites, which will enable Golan Telecom, which began to establish an independent national cellular infrastructure, to place its broadcasting cells on existing Cellcom masts throughout the country.<br><br>
                    The site-sharing agreement is consistent with Golan Telecom's policy to utilize existing masts as much as possible in order to accelerate the construction of its independent infrastructure, while taking into consideration the preservation of the environment as much as possible.
                    Golan Telecom thanks the members of the Cellcom team for the professionalism and service they have shown throughout the work on the internal roaming agreement.
                </p>
                <br><br>
                <p><b>For additional information: Yinon Harel - Harel-Mordy Integrated marketing communications</b><br><b> 03-6090906 || 0522688111</b></p>
         -->   </article>
            <article id="article04" class="modal-content"><!--
                <h3>The competition has a prefix - 058:</h3>
                <h4>The Ministry of Communications awarded a prefix to Golan Telecom customers - 058</h4>
                <br><br>
                <p>
                    The Ministry of Communications, which manages the numbering issue, recently announced that 058 is the new prefix in the cellular market. Golan Telecom customers will have numbers in the form of 058 XXX XX XX.
                    <br>
                    In the era of number portability, customers who switch from an existing operator to Golan Telecom will be able to do so while saving their original phone number.
                    <br>
                    According to various estimates in the communications market, millions of customers have already migrated between the cellular companies and the rate of abandonment for roaming is expected to increase as Golan Telecom enters the market.
                    During 2012, <b>Golan Telecom</b> will start the revolution for the benefit of the cellular consumer and for him.
                    <br><br>
                    Golan Telecom wishes to thank the Ministry of Communications for its speed and efficiency throughout all stages of its work, which helps us reach the starting line in 2012 and change the Israeli communications market for the Israeli consumer with a real revolution.
                </p>-->
            </article>
        </section>
    </aside>
    <!-- NAV AND MAIN VERSION FOR MOBILE-->
    <nav id="nav-mobile">
        <button class="nav-list-mobile" ><p></p><a href="#who-are-we-mobile">Who we are?</a></button>
        <section id="who-are-we-mobile">
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    We are a group of Israeli and foreign entrepreneurs and managers, including new immigrants, veteran Israelis and investors from abroad, with managerial experience, professional background and capital, working together to provide quality communications services at competitive prices. , With the intention of offering the Israeli public a winning cellular package.
                    <br><br>
                    Our activities abroad and in Israel in the face of huge and satisfying communications companies have been very successful and highly valued as an innovative, competitive and bold alternative, and our owners, Xenia Niall and Michael Golan are known for their aggressive competition in the French communications market.
                </p>
                <img src="images/people.png">
                <div class="clear"></div>
                <h4>The entrepreneurs</h4>
            </article>
            <section id="entrep-mobile"></section>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#what-we-do-mobile">What are we doing?</a></button>
        <section id="what-we-do-mobile">
            <span class="line"><h3>What are we doing?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    Our mission is to revolutionize the <b>cellular</b> world in Israel. no less. For this purpose, we competed in the cellular frequencies tender of the Ministry of Communications and were licensed.
                    We will compete with the existing cellular companies in order to bring about a <b>real</b> change in the standards of the cellular communications market in Israel. We are unique in that we are a company focused on the needs of the customer in the full sense of the word and its significance,
                    rather than creating a cash flow to cover the debts taken by the shareholders in order to acquire the communications companies operating in the market.
                </p><br>
                <p>
                    <b>We will provide the customer with a complete, clear and attractive package. </b>
                    in addition to a range of advanced cellular services. The communications packages that will be marketed will be fair and easy to understand, without "asterisks" and without "small letters".
                </p><br>
                <p>
                    We believe in an open and fair relationship between the customer and the cellular company while creating added value to our customers. We are loyal to our customers and do not view this as a contradiction to the economic interests of our shareholders.
                    They prove this for many years in France. <br>
                    We therefore commit ourselves to a competitive and equal price for every person and to provide quality service to our customers through innovative means.
                </p><br>
                <p>
                    We set a goal to set new standards in the cellular communications market in Israel. We know how to maintain a company that maintains a low cost basket with a "flat" organizational structure and not wasteful. The big savings we invest back in the client. <br>
                    We've done it successfully before. And we are certain that this time it will succeed.
                </p>
            </article>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#when-we-start-mobile">Start operating</a></button>
        <section id="when-we-start-mobile">
            <span class="line"><h3>When we'll start operating?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    The tender for cellular frequencies of the Ministry of Communications took place in the spring of 2011 and we were declared winners in the summer of 2011
                    We are in the midst of preparations for the establishment of the new cellular company in all aspects of engineering, services and operations: establishment of technological and engineering infrastructures, information systems, establishment of marketing systems, sale, distribution and service, establishment of the website and more. At the same time we recruit the professional and operational staff.
                </p>
                <br>
                <p>
                    <b>We plan to begin serving customers during 2012. <br>
                        Worth the wait!
                    </b>
                </p>
            </article>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#careers-mobile">Careers</a></button>
        <section id="careers-mobile">
            <span class="line"><h3>Careers</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <h4>Join the pioneers of Golan Telecom</h4>
                <img src="images/careers.png">
                <p>
                    We are looking for challenged and <b>talented</b> staff members and staff in a variety of roles and tasks. <br>
                    If you would like to work with us, please send an <b>e-mail</b> with a resume to the Human Resources Department at the following address,
                    stating the job title: <b>hr@gt.co.il</b>
                    We apologize in advance for the length of the process due to multiple requests to join the team.
                </p>
                <div class="clear"></div>
                <h4>our open positions</h4>
            </article>
            <article>
                <span class="job-num">1</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">Billing supervisor</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    Management of the system supplier, project management, implementation of the system, testing, ongoing operation of the system (entering price lists, checking invoices), implementation of new services and marketing proposals in the system. The billing supervisor should be familiar with the matter
                    Deepens the capabilities of the systems.
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    Needs fluent French, has a technological approach, has good communication skills and teamwork, assertive, high learning abilities,
                    energetic and willing to work hard and challenging. Flexible hours may be needed during stress events.
                </p>
            </article>
            <article>
                <span class="job-num">2</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">IT infrastructure engineer</span><br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    Responsibilities for server rooms (external), communications, operating systems, survivability management, information security,
                    management of workspaces, responsibility for employee end equipment, technical support.</p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    5-2 years of experience in the field of IT infrastructure, independent, self-learning, high motivation and willingness to work hard and challenging, services and excellent staff.
                </p>
            </article>
            <article>
                <span class="job-num">3</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">PHP Developer</span><br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    Experience in PHP programming (not WordPress / Joomla etc.) but actual programming).
                    <br>Experience in Object Oriented Development
                    <br>MySQL knowledge
                    <br>Knowledge in JavaScript / HTML / 5 / CSS / 3
                    <br>BA in relevant field
                    <br>Knowledge in NoSQL - an advantage
                </p>
                <span class="red-line"></span>
            </article>
            <article>
                <span class="job-num">1</span>
                <span class="job-property">Job category |</span><span class="job-val">Engineering</span>
                <span class="job-property">Job title |</span><span class="job-val">Core Network engineer</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    >> Leading the design and construction of the core of the cellular network: cellular components, IP, advanced services, physical infrastructures, connectivity <br>
                    >> Partner in the process of choosing solutions and suppliers <br>
                    >> Implementation of long-term planning of various network components, capacitance planning, survivability and quality of service <br>
                    >> Integrating new technology capabilities into intensive contact with system vendors
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    >> 3-5 years of experience in advanced telephony and cellular networks <br>
                    >> 3-5 years of experience in IP networks <br>
                    >> Familiarity with the network components of at least one of the leading providers in the field of cellular telephony <br>
                    >> Excellent teamwork and excellent integration skills in a small construction team <br>
                    >> Willingness to establish intensive and challenging activities
                </p>
            </article>
            <article>
                <span class="job-num">2</span>
                <span class="job-property">Job category |</span><span class="job-val">Engineering</span>
                <span class="job-property">Job title |</span><span class="job-val">Radio design engineer</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    >> Perform radio planning for the process of purchasing base stations and long-term network planning <br>
                    >> Responsibility for system performance <br>
                    >> Making daily decisions in defining search areas and setting up base stations,
                    Intensive support for the BS base station deployment process
                    >> Radio network features, tools development and operation, full professional control of the capabilities of the radio system <br>
                    >> Ongoing analysis of network performance
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    >> 3-5 years of experience as a radio design engineer using UMTS or CDMA technology <br>
                    >> Familiarity with relevant cellular system components, radio feature activation and performance analysis <br>
                    >> Excellent team work and excellent integration skills in a small construction team <br>
                    >> Willingness to work intensively and competitively
                </p>
            </article>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#contact-us-mobile">Contact Us</a></button>
        <section id="contact-us-mobile">
            <span class="line"><h3>Wanna take part in the revolution?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <form>
            </form>
        </section>
    </nav>
    <!-- /END OF NAV AND MAIN VERSION FOR MOBILE-->
    <main>
        <section id="what-we-do">
            <h1>What are we doing?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    Our mission is to revolutionize the <b>cellular</b> world in Israel. no less. For this purpose, we competed in the cellular frequencies tender of the Ministry of Communications and were licensed.
                    We will compete with the existing cellular companies in order to bring about a <b>real</b> change in the standards of the cellular communications market in Israel. We are unique in that we are a company focused on the needs of the customer in the full sense of the word and its significance,
                    rather than creating a cash flow to cover the debts taken by the shareholders in order to acquire the communications companies operating in the market.
                </p><br>
                <p>
                    <b>We will provide the customer with a complete, clear and attractive package. </b>
                    in addition to a range of advanced cellular services. The communications packages that will be marketed will be fair and easy to understand, without "asterisks" and without "small letters".
                </p><br>
                <p>
                    We believe in an open and fair relationship between the customer and the cellular company while creating added value to our customers. We are loyal to our customers and do not view this as a contradiction to the economic interests of our shareholders.
                    They prove this for many years in France. <br>
                    We therefore commit ourselves to a competitive and equal price for every person and to provide quality service to our customers through innovative means.
                </p><br>
                <p>
                    We set a goal to set new standards in the cellular communications market in Israel. We know how to maintain a company that maintains a low cost basket with a "flat" organizational structure and not wasteful. The big savings we invest back in the client. <br>
                    We've done it successfully before. And we are certain that this time it will succeed.
                </p>
            </article>
        </section>
        <span class="boundary-line"></span>
        <section id="who-are-we">
            <h1>Who we are?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    We are a group of Israeli and foreign entrepreneurs and managers, including new immigrants, veteran Israelis and investors from abroad, with managerial experience, professional background and capital, working together to provide quality communications services at competitive prices. , With the intention of offering the Israeli public a winning cellular package.
                    <br><br>
                    Our activities abroad and in Israel in the face of huge and satisfying communications companies have been very successful and highly valued as an innovative, competitive and bold alternative, and our owners, Xenia Niall and Michael Golan are known for their aggressive competition in the French communications market.
                </p>
                <img src="images/people.png">
                <div class="clear"></div>
                <h4>The entrepreneurs</h4>
                <img src="images/hand.png">
                <img src="images/logo_free.png">
            </article>
            <section id="entrep-area"></section>
        </section>
        <span class="boundary-line"></span>
        <section id="when-we-start">
            <h1>When will we start operating?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    The tender for cellular frequencies of the Ministry of Communications took place in the spring of 2011 and we were declared winners in the summer of 2011
                    We are in the midst of preparations for the establishment of the new cellular company in all aspects of engineering, services and operations: establishment of technological and engineering infrastructures, information systems, establishment of marketing systems, sale, distribution and service, establishment of the website and more. At the same time we recruit the professional and operational staff.
                </p>
                <br>
                <p>
                    <b>We plan to begin serving customers during 2012. <br>
                        Worth the wait!
                    </b>
                </p>
            </article>
        </section>
        <span class="boundary-line"></span>
        <section id="careers">
            <h1>Careers</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <h4>Join the pioneers of Golan Telecom</h4>
                <img src="images/careers.png">
                <p>
                    We are looking for challenged and <b>talented</b> staff members and staff in a variety of roles and tasks. <br>
                    If you would like to work with us, please send an <b>e-mail</b> with a resume to the Human Resources Department at the following address,
                    stating the job title: <b>hr@gt.co.il</b>
                    We apologize in advance for the length of the process due to multiple requests to join the team.
                </p>
                <div class="clear"></div>
                <h4>Our open positions</h4>
            </article>
            <?php
            $data = selectQuery($connection, $query1);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
        <!--    <article>
                <span class="job-num">1</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">Billing supervisor</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    Management of the system supplier, project management, implementation of the system, testing, ongoing operation of the system (entering price lists, checking invoices), implementation of new services and marketing proposals in the system. The billing supervisor should be familiar with the matter
                    Deepens the capabilities of the systems.
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    Needs fluent French, has a technological approach, has good communication skills and teamwork, assertive, high learning abilities,
                    energetic and willing to work hard and challenging. Flexible hours may be needed during stress events.
                </p>
            </article>-->
          <!--  <article>
                <span class="job-num">2</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">IT infrastructure engineer</span><br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    Responsibilities for server rooms (external), communications, operating systems, survivability management, information security,
                    management of workspaces, responsibility for employee end equipment, technical support.</p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    5-2 years of experience in the field of IT infrastructure, independent, self-learning, high motivation and willingness to work hard and challenging, services and excellent staff.
                </p>
            </article>-->
            <!--<article>
                <span class="job-num">3</span>
                <span class="job-property">Job category |</span><span class="job-val">Information Systems</span>
                <span class="job-property">Job title |</span><span class="job-val">PHP Developer</span><br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    Experience in PHP programming (not WordPress / Joomla etc.) but actual programming).
                    <br>Experience in Object Oriented Development
                    <br>MySQL knowledge
                    <br>Knowledge in JavaScript / HTML / 5 / CSS / 3
                    <br>BA in relevant field
                    <br>Knowledge in NoSQL - an advantage
                </p>-->
            <article class="job">
                <span class="red-line"></span>
            </article>
            <?php
            $data = selectQuery($connection, $query2);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
          <!--  <article>
                <span class="job-num">1</span>
                <span class="job-property">Job category |</span><span class="job-val">Engineering</span>
                <span class="job-property">Job title |</span><span class="job-val">Core Network Engineer</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    >> Leading the design and construction of the core of the cellular network: cellular components, IP, advanced services, physical infrastructures, connectivity <br>
                    >> Partner in the process of choosing solutions and suppliers <br>
                    >> Implementation of long-term planning of various network components, capacitance planning, survivability and quality of service <br>
                    >> Integrating new technology capabilities into intensive contact with system vendors
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    >> 3-5 years of experience in advanced telephony and cellular networks <br>
                    >> 3-5 years of experience in IP networks <br>
                    >> Familiarity with the network components of at least one of the leading providers in the field of cellular telephony <br>
                    >> Excellent teamwork and excellent integration skills in a small construction team <br>
                    >> Willingness to establish intensive and challenging activities
                </p>
            </article>-->
          <!--  <article>
                <span class="job-num">2</span>
                <span class="job-property">Job category |</span><span class="job-val">Engineering</span>
                <span class="job-property">Job title |</span><span class="job-val">Radio design Engineer</span>
                <br>
                <span class="job-desc">Responsibilities |</span>
                <p class="job-desc-val">
                    >> Perform radio planning for the process of purchasing base stations and long-term network planning <br>
                    >> Responsibility for system performance <br>
                    >> Making daily decisions in defining search areas and setting up base stations,
                    Intensive support for the BS base station deployment process
                    >> Radio network features, tools development and operation, full professional control of the capabilities of the radio system <br>
                    >> Ongoing analysis of network performance
                </p>
                <br>
                <span class="job-desc">Qualifications |</span>
                <p class="job-desc-val">
                    >> 3-5 years of experience as a radio design engineer using UMTS or CDMA technology <br>
                    >> Familiarity with relevant cellular system components, radio feature activation and performance analysis <br>
                    >> Excellent team work and excellent integration skills in a small construction team <br>
                    >> Willingness to work intensively and competitively
                </p>
            </article>-->
        </section>
        <span class="boundary-line"></span>
        <section id="contact-us">
            <h1>Wanna take part in the revolution?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <section id="form-back">
                <form  action="action.php" method="post" autocomplete="on">
                    <section>
                        <span>Me</span>
                        <br>
                        <input type="text" name="username" placeholder="Name/Company">
                        <input type="text" name="company" placeholder="Company">
                    </section>
                    <section>
                        <span>You can reach me on:</span>
                        <input type="email" name="email" placeholder="E-Mail">
                        <input type="tel" name="phone" placeholder="Phone">
                    </section>
                    <div class="clear"></div>
                    <br>
                    <section>
                        <span>Today I'm subscribed to:</span>
                        <label><input type="radio" name="subscription" value="cellcom"> Cellcom</label>
                        <label><input type="radio" name="subscription" value="pelephone" placeholder=" "> Pelephone</label>
                        <label><input type="radio" name="subscription" value="orange"> Orange </label>
                        <label><input type="radio" name="subscription" value="mirs"> Mirs </label>
                    </section>
                    <br>
                    <section>
                        <span>I'm a customer:</span>
                        <label><input type="radio" name="satisfaction" value="yes"> Satisfied </label>
                        <label><input type="radio" name="satisfaction" value="no"> Unsatisfied </label>
                        <span>My last bill:</span>
                        <input type="text" id="bill" name="bill" placeholder="Write bills:">
                        <br>
                    </section>
                    <section>
                        <span>Interested in:</span>
                        <span>[ Mark your options ]</span>
                        <br>
                        <input type="checkbox" name="interests[]" value="first-customer">
                        <label>Be among the first customers</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="try-services">
                        <label>Experiment with the new service</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="contact-me">
                        <label>Contact me</label>
                    </section>
                    <input type="submit" value="Submit">
                    <p>*Please note that we apologize for the delay in response due to multiple referrals</p>
                </form>
                <span></span>
            </section>
        </section>
    </main>
</div>

<script src="includes/scripts.js"></script>
<script>
    (function() {
        fetchJson("includes/entrep-en.json");
    })();
</script>
</body>
</html>
