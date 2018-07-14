<?php

    include('db.php');

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!mysqli_set_charset($connection, 'utf8')) {
        echo 'the connection is not in utf8';
        exit();
    }

    //get data from DB
    $query1 = "SELECT * FROM tb_careers1_230 WHERE category='מערכות מידע' AND lang='heb'";
    $query2 = "SELECT * FROM tb_careers1_230 WHERE category='הנדסה' AND lang='heb'";
    $queryNews = "SELECT header,id FROM `tb_news_230` WHERE lang='heb' ORDER BY id";
    $queryArticle = "SELECT * FROM `tb_news_230` WHERE lang='heb'";

    function getCareers($result) {
        $count = 0;

        //use return data (if any)
        while($row = mysqli_fetch_assoc($result)) {
            //results are in associative array. keys are cols names
            //output data from each row
            $count++;
            echo "<article class=\"job\"" . " id=\"" . $row["id"] . "\">";
            echo "<span>" . $count . "</span>";
            echo "<span>" . "תחום | " . "</span>" . "<span>" . $row["category"] . "</span>";
            echo "<span>" . "התפקיד | " . "</span>" . "<span>" . $row["title"] . "</span>";
            echo "<br>";
            if ($row["responsibilities"] != null) {
                echo "<span class=\"job-desc\">תיאור | </span>";
                echo "<p class=\"job-desc-val\">" . $row["responsibilities"] . "</p><br>";
            }
            echo "<span class=\"job-desc\">דרישות | </span>";
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
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Golan Telecom</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <link rel="stylesheet"  href="includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <header>
        <a class="logo" href="#"></a>
        <a class="lang" href="en-index.php"><b>English</b></a>
        <a class="admin" href="admin.php"><b>מנהל</b></a>
    </header>
    <section id="golan-telecom-top">
        <h1>גולן טלקום, השחקן החדש בעולם הסלולר</h1>
        <span class="side-line"></span>
        <span class="title-icon"></span>
        <article>
            <p><b>“כניסה של מפעיל סלולרי נוסף תביא
                    להגברת ‬התחרות ולהוזלת המחירים לצרכן”</b></p>
            <span>‫שר התקשורת משה כחלון, יולי 2011</span>
            <p><b>הרמנו את הכפפה! <br>
                    אנחנו בדרך להובלת שינוי אמיתי בסלולר</b></p>
            <p><b> בא לך לקחת חלק<span> במהפכה?</span></b></p>
            <a href="#contact-us">לחץ כאן</a>
        </article>
    </section>
    <nav>
        <ul id="nav-list">
            <li><p></p><a href="#what-we-do">מה אנחנו עושים?</a></li>
            <li><p></p><a href="#who-are-we">מי אנחנו?</a></li>
            <li><p></p><a href="#when-we-start">מתי נתחיל לפעול?</a></li>
            <li><p></p><a href="#careers">דרושים</a></li>
            <li><p></p><a href="#contact-us">צור קשר</a></li>
        </ul>
    </nav>
    <span class="boundary-line"></span>
    <div class="clear"></div>
    <aside>
        <h5>RSS ועדכונים</h5>
        <span></span>
        <h5>מהעיתונות</h5>
        <?php
            $data = makeQuery($connection, $queryNews);

            if(isset($data)) {
                getNewsList($data);
            }
        ?>
        <span class="close"></span>
        <section id="myModal" class="modal">
            <?php
            $data = makeQuery($connection, $queryArticle);

            if(isset($data)) {
                getArticles($data);
            }
            ?>
        </section>
    </aside>
    <!-- NAV AND MAIN VERSION FOR MOBILE-->
    <nav id="nav-mobile">
        <button class="nav-list-mobile" ><p></p><a href="#who-are-we-mobile">מי אנחנו?</a></button>
        <section id="who-are-we-mobile">
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    אנו קבוצה של  יזמים ומנהלים ישראלים וזרים, הכוללת עולים חדשים, ישראלים ותיקים ומשקיעים מחו"ל, בעלי ניסיון ניהולי, רקע מקצועי והון, הפועלים יחד למתן שירותי תקשורת איכותיים במחירים תחרותיים. אספנו סביבנו אנשי מפתח נבחרים, כולם מקצוענים בעלי מוניטין וניסיון בשוק התקשורת והמדיה, מתוך כוונה להציע לציבור בישראל חבילה סלולרית מנצחת.
                    <br><br>
                    פעילותנו בחו"ל ובישראל מול חברות תקשורת ענקיות ושבעות, זכתה להצלחה ולהערכה רבה כאלטרנטיבה חדשנית, תחרותית ונועזת. בעלי הקבוצה שלנו, קסביה ניאל ומיכאל גולן נודעים כיצרני תחרות אגרסיבית למונופולים בשוק התקשורת בצרפת.
                </p>
                <img src="images/people.png">
                <div class="clear"></div>
                <h4>היזמים</h4>
            </article>
            <section id="entrep-mobile"></section>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#what-we-do-mobile">מה אנחנו עושים?</a></button>
        <section id="what-we-do-mobile">
            <span class="line"><h3>מה אנחנו עושים?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    ייעודנו הוא לחולל מהפכה בעולם<b> הסלולר </b> בישראל. לא פחות. לשם כך התמודדנו במכרז התדרים הסלולריים של משרד התקשורת וזכינו ברישיון. אנו נתחרה בחברות הסלולר הקיימות במטרה להביא לשינוי </b>אמיתי </b> בסטנדרטים של שוק התקשורת הסלולרית בישראל. ייחודנו בהיותנו חברה הממוקדת בצרכי הלקוח במלוא מובן המילה ומשמעותה  ולא ביצירת תזרים מזומנים לכיסוי החובות שנטלו בעלי המניות, כדי לרכוש את חברות התקשורת הפועלות בשוק.
                </p><br>
                <p>
                    <b>אנו נספק ללקוח חבילה מלאה, ברורה ואטרקטיבית. </b>וזאת בנוסף למגוון שירותים סלולריים מתקדמים. חבילות התקשורת שנשווק יהיו הוגנות ופשוטות להבנה, ללא "כוכביות" ובלי "אותיות קטנות".
                </p><br>
                <p>
                    אנו מאמינים במערכת יחסים פתוחה והוגנת בין הלקוח והחברה הסלולרית תוך יצירת ערך מוסף ללקוחותינו. אנו נאמנים ללקוחות שלנו ואין אנו רואים זאת כסתירה לאינטרסים הכלכליים של בעלי המניות שלנו. הם מוכיחים זאת במשך שנים רבות בצרפת. <br>
                    על כן אנו מתחייבים למחיר תחרותי ושווה לכל נפש ולמתן שירות איכותי ללקוחותינו באמצעים חדשניים.
                </p><br>
                <p>
                    הצבנו לנו יעד לקבוע סטנדרטים חדשים בשוק התקשורת הסלולרית בישראל. אנו יודעים לקיים חברה השומרת על סל עלויות רזה עם מבנה אירגוני "שטוח"  ולא בזבזני. את סכומי החיסכון הגדולים אנו משקיעים בחזרה בלקוח. <br>
                    עשינו זאת בעבר בהצלחה. ואנו בטוחים שגם הפעם זה יצליח.
                </p>
            </article>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#when-we-start-mobile">מתי נתחיל לפעול?</a></button>
        <section id="when-we-start-mobile">
            <span class="line"><h3>מתי נתחיל לפעול?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    מכרז התדרים הסלולריים של משרד התקשורת התקיים באביב 2011 ואנו הוכרזנו כזוכים בקיץ  2011
                    אנו בעיצומה של ההערכות להקמת חברת הסלולר החדשה בכל ההיבטים ההנדסיים, השירותיים והתפעוליים: הקמת תשתיות טכנולוגיות, הנדסיות, מערכות מידע, הקמת מערכי השיווק, המכירה,ההפצה והשירות, הקמת אתר האינטרנט ועוד. במקביל אנו מגייסים את הצוות המקצועי והתפעולי.
                </p><br>
                <p>
                    <b>
                        בכוונתנו להתחיל לתת שירות ללקוחות במהלך 2012. <br>
                        שווה לחכות!
                    </b>
                </p>
            </article>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#careers-mobile">דרושים</a></button>
        <section id="careers-mobile">
            <span class="line"><h3>דרושים</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <h4>הצטרפות לחלוצי גולן טלקום</h4>
                <img src="images/careers.png">
                <p>
                    אנו מחפשים חברי וחברות צוות מאותגרים, מוכשרים<b> ומצויינים </b> במגוון תפקידים ומשימות. <br>
                    אם ברצונך לעבוד יחד איתנו אנא שלח/י<b> מייל </b>בצירוף קורות חיים למחלקת משאבי אנוש לפי הכתובת הבאה תוך ציון שם המשרה: <b> hr@gt.co.il </b>
                    אנו מתנצלים מראש על משך התהליך עקב ריבוי הפניות בבקשה להצטרף לצוות.
                </p>
                <div class="clear"></div>
                <h4>משרות פנויות אצלנו</h4>
            </article>
            <?php
            $data = makeQuery($connection, $query1);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
            <article class="job">
                <span class="red-line"></span>
            </article>
            <?php
            $data = makeQuery($connection, $query2);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
        </section>
        <button class="nav-list-mobile"><p></p><a href="#contact-us-mobile">צור קשר</a></button>
        <section id="contact-us-mobile">
            <span class="line"><h3>רוצים לקחת חלק במהפכה?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <section>
                <form  action="action-mobile.php" method="post" autocomplete="on">
                    <section>
                        <input type="text" name="username" required placeholder="שם/חברה">
                        <input type="text" name="company" placeholder="חברה">
                    </section>
                    <section>
                        <input type="email" name="email" required placeholder="E-Mail">
                        <input type="tel" name="phone" required placeholder="נייד">
                    </section>
                    <section>
                        <span>היום אני מנוי של:</span><br>
                        <label><input type="checkbox" name="subscription[]" value="cellcom"> סלקום</label>
                        <label><input type="checkbox" name="subscription[]" value="pelephone" placeholder=" ">  פלאפון</label>
                        <label><input type="checkbox" name="subscription[]" value="orange"> אורנג' </label>
                        <label><input type="checkbox" name="subscription[]" value="mirs"> מירס</label>
                    </section>
                    <section>
                        <span>לקוח מרוצה?</span>
                        <label class="switch">
                            <input type="checkbox" name="satisfaction">
                            <span class="slider round"></span>
                        </label>
                    </section>
                    <section>
                        <span>החשבון האחרון שלי:</span>
                        <input type="text" id="bill" name="bill" required placeholder="רשום סכום">
                    </section>
                    <section>
                        <span>מעוניין ש:</span>
                        <br>
                        <input type="checkbox" name="interests[]" value="first-customer">
                        <label class="check">להיות בין ראשוני הלקוחות</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="try-services">
                        <label class="check">להתנסות בשירותכם החדשים לכשיופעלו</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="contact-me">
                        <label class="check">צרו עימי קשר</label>
                    </section>
                    <input type="submit" value="שלח">
                </form>
            </section>
        </section>
    </nav>
    <!-- /END OF NAV AND MAIN VERSION FOR MOBILE-->
    <main>
        <section id="what-we-do">
            <h1>מה אנחנו עושים?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    ייעודנו הוא לחולל מהפכה בעולם<b> הסלולר </b> בישראל. לא פחות. לשם כך התמודדנו במכרז התדרים הסלולריים של משרד התקשורת וזכינו ברישיון. אנו נתחרה בחברות הסלולר הקיימות במטרה להביא לשינוי </b>אמיתי </b> בסטנדרטים של שוק התקשורת הסלולרית בישראל. ייחודנו בהיותנו חברה הממוקדת בצרכי הלקוח במלוא מובן המילה ומשמעותה  ולא ביצירת תזרים מזומנים לכיסוי החובות שנטלו בעלי המניות, כדי לרכוש את חברות התקשורת הפועלות בשוק.
                </p><br>
                <p>
                    <b>אנו נספק ללקוח חבילה מלאה, ברורה ואטרקטיבית. </b>וזאת בנוסף למגוון שירותים סלולריים מתקדמים. חבילות התקשורת שנשווק יהיו הוגנות ופשוטות להבנה, ללא "כוכביות" ובלי "אותיות קטנות".
                </p><br>
                <p>
                    אנו מאמינים במערכת יחסים פתוחה והוגנת בין הלקוח והחברה הסלולרית תוך יצירת ערך מוסף ללקוחותינו. אנו נאמנים ללקוחות שלנו ואין אנו רואים זאת כסתירה לאינטרסים הכלכליים של בעלי המניות שלנו. הם מוכיחים זאת במשך שנים רבות בצרפת. <br>
                    על כן אנו מתחייבים למחיר תחרותי ושווה לכל נפש ולמתן שירות איכותי ללקוחותינו באמצעים חדשניים.
                </p><br>
                <p>
                    הצבנו לנו יעד לקבוע סטנדרטים חדשים בשוק התקשורת הסלולרית בישראל. אנו יודעים לקיים חברה השומרת על סל עלויות רזה עם מבנה אירגוני "שטוח"  ולא בזבזני. את סכומי החיסכון הגדולים אנו משקיעים בחזרה בלקוח. <br>
                    עשינו זאת בעבר בהצלחה. ואנו בטוחים שגם הפעם זה יצליח.
                </p>
            </article>
        </section>
        <span class="boundary-line"></span>
        <section id="who-are-we">
            <h1>מי אנחנו?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    אנו קבוצה של  יזמים ומנהלים ישראלים וזרים, הכוללת עולים חדשים, ישראלים ותיקים ומשקיעים מחו"ל, בעלי ניסיון ניהולי, רקע מקצועי והון, הפועלים יחד למתן שירותי תקשורת איכותיים במחירים תחרותיים. אספנו סביבנו אנשי מפתח נבחרים, כולם מקצוענים בעלי מוניטין וניסיון בשוק התקשורת והמדיה, מתוך כוונה להציע לציבור בישראל חבילה סלולרית מנצחת.
                    <br><br>
                    פעילותנו בחו"ל ובישראל מול חברות תקשורת ענקיות ושבעות, זכתה להצלחה ולהערכה רבה כאלטרנטיבה חדשנית, תחרותית ונועזת. בעלי הקבוצה שלנו, קסביה ניאל ומיכאל גולן נודעים כיצרני תחרות אגרסיבית למונופולים בשוק התקשורת בצרפת.
                </p>
                <img src="images/people.png">
                <div class="clear"></div>
                <h4>היזמים</h4>
                <img src="images/hand.png">
                <img src="images/logo_free.png">
            </article>
            <section id="entrep-area"></section>
        </section>
        <span class="boundary-line"></span>
        <section id="when-we-start">
            <h1>מתי נתחיל לפעול?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <p>
                    מכרז התדרים הסלולריים של משרד התקשורת התקיים באביב 2011 ואנו הוכרזנו כזוכים בקיץ  2011
                    אנו בעיצומה של ההערכות להקמת חברת הסלולר החדשה בכל ההיבטים ההנדסיים, השירותיים והתפעוליים: הקמת תשתיות טכנולוגיות, הנדסיות, מערכות מידע, הקמת מערכי השיווק, המכירה,ההפצה והשירות, הקמת אתר האינטרנט ועוד. במקביל אנו מגייסים את הצוות המקצועי והתפעולי.
                </p><br>
                <p>
                    <b>
                        בכוונתנו להתחיל לתת שירות ללקוחות במהלך 2012. <br>
                        שווה לחכות!
                    </b>
                </p>
            </article>
        </section>
        <span class="boundary-line"></span>
        <section id="careers">
            <h1>דרושים</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <article>
                <h4>הצטרפות לחלוצי גולן טלקום</h4>
                <img src="images/careers.png">
                <p>
                    אנו מחפשים חברי וחברות צוות מאותגרים, מוכשרים<b> ומצויינים </b> במגוון תפקידים ומשימות. <br>
                    אם ברצונך לעבוד יחד איתנו אנא שלח/י<b> מייל </b>בצירוף קורות חיים למחלקת משאבי אנוש לפי הכתובת הבאה תוך ציון שם המשרה: <b> hr@gt.co.il </b>
                    אנו מתנצלים מראש על משך התהליך עקב ריבוי הפניות בבקשה להצטרף לצוות.
                </p>
                <div class="clear"></div>
                <h4>משרות פנויות אצלנו</h4>
            </article>
            <?php
            $data = makeQuery($connection, $query1);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
            <article class="job">
                <span class="red-line"></span>
            </article>
            <?php
            $data = makeQuery($connection, $query2);

            if(isset($data)) {
                getCareers($data);
            }
            ?>
        </section>
        <span class="boundary-line"></span>
        <section id="contact-us">
            <h1>רוצים לקחת חלק במהפכה?</h1>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <section id="form-back">
                <form  action="action.php" method="post" autocomplete="on">
                    <section>
                        <span>אני</span>
                        <br>
                        <input type="text" name="username" required placeholder="שם/חברה">
                        <input type="text" name="company" placeholder="חברה">
                    </section>
                    <section>
                        <span>ניתן להשיג אותי:</span>
                        <input type="email" name="email" required placeholder="E-Mail">
                        <input type="tel" name="phone" required placeholder="נייד">
                    </section>
                    <div class="clear"></div>
                    <br>
                    <section>
                        <span>היום אני מנוי של:</span>
                        <label><input type="radio" name="subscription" value="cellcom"> סלקום</label>
                        <label><input type="radio" name="subscription" value="pelephone" placeholder=" ">  פלאפון</label>
                        <label><input type="radio" name="subscription" value="orange"> אורנג' </label>
                        <label><input type="radio" name="subscription" value="mirs"> מירס</label>
                    </section>
                    <br>
                    <section>
                        <span>אני לקוח:</span>
                        <label><input type="radio" name="satisfaction" value="1"> מרוצה </label>
                        <label><input type="radio" name="satisfaction" value="0"> לא מרוצה </label>
                        <span>החשבון האחרון שלי:</span>
                        <input type="text" id="bill" name="bill" required placeholder="רשום סכום">
                        <br>
                    </section>
                    <section>
                        <span>מעוניין ש:</span>
                        <span>[ סמן כל מה שמתאים לך ]</span>
                        <br>
                        <input type="checkbox" name="interests[]" value="first-customer">
                        <label>להיות בין ראשוני הלקוחות</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="try-services">
                        <label>להתנסות בשירותכם החדשים לכשיופעלו</label>
                        <br>
                        <input type="checkbox" name="interests[]" value="contact-me">
                        <label>צרו עימי קשר</label>
                    </section>
                    <input type="submit" value="שלח">
                    <p>* לתשומת לבך אנו מתנצלים על משך זמן המענה עקב ריבוי הפניות</p>
                </form>
                <span></span>
            </section>
        </section>
    </main>
</div>
<script src="includes/scripts.js"></script>
<script>
    (function() {
        fetchJson("includes/entrep.json");
    })();
</script>
</body>
</html>
<?php
//close DB connection
mysqli_close($connection);
?>
