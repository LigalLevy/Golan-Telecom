<?php

    include('db.php');

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //get data from DB
    $query1 = "SELECT * FROM tb_careers1_230 WHERE category='Information Systems' AND lang='eng'";
    $query2 = "SELECT * FROM tb_careers1_230 WHERE category='Engineering' AND lang='eng'";
    $queryNews = "SELECT header,id FROM `tb_news_230` WHERE lang='eng' ORDER BY id";
    $queryArticle = "SELECT * FROM `tb_news_230` WHERE lang='eng'";

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
            echo "<li id=\"" . $row["id"] . "\" >";
            echo "<a href=\"#0" . $row["id"] ."\" >";
            echo $row["header"];
            echo "</a></li>";
        }

        echo "</ul>";

        //release returned data
        mysqli_free_result($result);
    }

    function getArticles ($result) {
        //use return data (if any)
        while ($row = mysqli_fetch_assoc($result)) {
            //results are in associative array. keys are cols names
            //output data from each row
            echo "<article id=\"0" . $row["id"] . "\"". " >";
            if(isset($row['extraTitle'])) {
                echo "<h3>" . $row['extraTitle'] . "</h3>";
            }
            echo "<h4>" . $row["title"] . "</h4>";
            echo $row["text"];
            if(isset($row['boldFooter'])) {
                echo $row['boldFooter'];
            }
            echo "</article>";
        }

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
        <span class="close"></span>
        <section id="myModal" class="modal">
            <?php
            $data = selectQuery($connection, $queryArticle);

            if(isset($data)) {
                getArticles($data);
            }
            ?>
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
            <?php
            $data = selectQuery($connection, $query1);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
            <article class="job">
                <span class="red-line"></span>
            </article>
            <?php
            $data = selectQuery($connection, $query2);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#contact-us-mobile">Contact Us</a></button>
        <section id="contact-us-mobile">
            <span class="line"><h3>Wanna take part in the revolution?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <section>
                <form  action="action-mobile.php" method="post" autocomplete="on">
                    <section>
                        <input type="text" name="username" placeholder="Name/Company">
                        <input type="text" name="company" placeholder="Company">
                    </section>
                    <section>
                        <input type="email" name="email" placeholder="E-Mail">
                        <input type="tel" name="phone" placeholder="Phone">
                    </section>
                    <section>
                        <span>Today I'm subscribed to:</span><br>
                        <label><input type="checkbox" name="subscription[]" value="cellcom"> Cellcom</label>
                        <label><input type="checkbox" name="subscription[]" value="pelephone" placeholder=" "> Pelephone</label>
                        <label><input type="checkbox" name="subscription[]" value="orange"> Orange </label>
                        <label><input type="checkbox" name="subscription[]" value="mirs"> Mirs </label>
                    </section>
                    <section>
                        <span>Satisfied customer?</span>
                        <label class="switch">
                            <input type="checkbox" name="satisfaction">
                            <span class="slider round"></span>
                        </label>
                    </section>
                    <section>
                        <span>My last bill:</span>
                        <input type="text" id="bill" name="bill" placeholder="Write bills:">
                    </section>
                    <section>
                        <span>Interested in:</span>
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
                </form>
            </section>
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
            <article class="job">
                <span class="red-line"></span>
            </article>
            <?php
            $data = selectQuery($connection, $query2);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
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
