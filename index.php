<?php
    //create a mySQL DB connection:
    /*$dbhost = "182.50.133.51";
    $dbuser = "studDB18A";
    $dbpass = "stud18aDB1!";
    $dbname = "studDB18A";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }*/


    include('db.php');

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //get data from DB
    $query1 = "SELECT * FROM tb_careers1_230 WHERE category='מערכות מידע' AND lang='heb'";
    $query2 = "SELECT * FROM tb_careers1_230 WHERE category='הנדסה' AND lang='heb'";

    /*function selectQuery ($connection , $query) {
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("DB query failed.");
        }

        return $result;
    }*/

    function getCareers($result) {
        $count = 0;

        //use return data (if any)
        while($row = mysqli_fetch_assoc($result)) {
            //results are in associative array. keys are cols names
            //output data from each row
            $count++;
            echo "<article class=\"job\">";
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
        <ul id="articles">
            <li><a href="#article01" id="myBtn">גולן טלקום הגשת מכרז</a></li>
            <li><a href="#article02">מסירת ערבות גולן טלקום</a></li>
            <li><a href="#article03">הסכם נדידה פנים ארצי</a></li>
            <li><a href="#article04">הקדומת של גולן טלקום</a></li>
        </ul>
        <span class="close"></span>
        <section id="myModal" class="modal">
            <article id="article01" class="modal-content">
                <h4>קבוצת גולן טלקום, בראשה עומד היזם והמנכ"ל מיכאל גולן הגישה היום את הצעתה במכרז התדרים הסלולרי של משרד התקשורת</h4><br>
                <p>קבוצת גולן טלקום, בראשה עומד היזם והמנכ"ל מיכאל גולן הגישה היום את הצעתה במכרז התדרים הסלולרי של משרד התקשורת,  בו ייבחרו שני מפעילים חדשים. <br>
                    9 ארגזי ההצעה של גולן טלקום נמסרו לוועדת המכרזים במשרד התקשורת בירושלים היום אחה"צ, על ידי אורן מוסט העומד בראש צוות המכרז, עו"ד ניצן אברבך ממשרד עו"ד צלרמאיר- פילוסוף ושי דוידור, מהצוות ההנדסי של הקבוצה.
                </p><br>
                <h4>מיכאל גולן :</h4>
                <p>"קבוצת גולן טלקום, שותפיי, קסביאר ניאל, בעל השליטה בחברת ILIAD, האחים פרייאנט  וחברי לצוות המכרז ולדרך, מתרגשים היום מאד מן המעמד הייחודי המאפשר לנו להתמודד במכרז התדרים לקבלת רישיון סלולרי חדש בישראל. <br>
                    אנו מודים למשרד התקשורת ולעומד בראשו על פתיחת שוק התקשורת הישראלי לתחרות חופשית ולהבאת הבשורה והמהפכה שכל צרכן תקשורת כה מייחל לה". <br>
                    "אנו נעשה את המקסימום כדי למנף את הידע והניסיון העצומים של העומדים מאחורי הקבוצה שלנו לתועלת הצרכן והשוק הסלולרי בישראל. <br>
                    "בשם קבוצת המשקיעים ובעלי המניות, ההנהלה הבכירה והשותפים לדרך בחברת גולן טלקום אנו מבקשים להודות למשרד התקשורת ולעומד בראשו, השר משה כחלון, על פתיחת הצוהר לעולם תקשורת חדש, מרתק ונועז שללא ספק ישנה את עולם התקשורת הישראלי, כפי שאנו וצרכניו מכירים אותו עד היום. אנו תקווה כי זהו צעד ראשון לתחרות חופשית ולהפחתת מחיר משמעותית עבור קהל הצרכנים".
                </p><br>
                <h4>אורן מוסט :</h4>
                <p>"אנו מתעוררים לבוקר שאחריו עולם התקשורת בישראל לא יהיה כתמול שלשום. הקטר החל בתנועתו אל היעד - שינוי מיוחל במפת התקשורת והסלולר בישראל לטובת הצרכנים ועבורם. <br>
                    אני גאה להיות חלק מהקבוצה הנדירה הזאת של יזמים ומנהלים, בראשות מיכאל גולן וקסביאר ניאל, שהינם בעלי רקורד פנטסטי בהקמה וניהול של חברת התקשורת ILIAD.  <br>
                    תחת המותג FREE מספקת ILIAD למיליוני צרפתים חבילת שירותים נדיבה ומגוונת שגרמה למתחריה להוזלת מחירים בשיעור של כ40%!!!,  III <br>
                    בישראל, שהייתה חלוצה עולמית המהפכת התקשורת האישית הניידת באמצע שנות ה-90, חסרה כיום התחרותיות שכה אפיינה פעם את השוק הסלולרי. מכרז התדרים יעורר ויחולל תחרותיות לרווחת הצרכנים, איכות החיים ותועלת המשק בכללותו.
                </p>
            </article>
            <article id="article02" class="modal-content">
                <h4>גולן טלקום משלימה את כל התחייבויותיה מבעוד מועד: <br>
                    הגישה למשרד התקשורת את הערבות הבנקאית
                    בסך 360 מליון ₪ מבנק מזרחי טפחות
                </h4>
                <h6>החברה החלה בגיוס אנשי מפתח להקמת תשתיות הטכנולוגיה,ההנדסה ומערכות המידע ומזמינה מועמדים לשלוח קו"ח לכתובת : HR@golantelecom.co.il</h6>
                <br>
                <p><b>
                        גולן טלקום השלימה מבעוד מועד את כל התחייבויותיה עפ"י מכרז התדרים והגישה היום לשר התקשורת, ח"כ משה כחלון, את הערבות הבנקאית בסך 360 מליון ₪, בטקס קצר שנערך במשרדו. </b>
                </p>
                <p>עם מסירת הערבות הבנקאית כנדרש, <b>עומדת גולן טלקום</b> בכל הדרישות שהציב משרד התקשורת למכרז, שיזם השר משה כחלון על מנת להמריץ את שוק הסלולר באמצעות הוספת מתחרים חדשים. </p>
                <p>
                    <b>גולן טלקום </b>מבקשת להודות לשר התקשורת, ח"כ משה כחלון, ליו"ר וועדת המכרזים, ד"ר אסף כהן ולחברי הוועדה ולצוות המקצועי של משרד התקשורת, על המהלך המהפכני המכוון לטובת הצרכנים הישראליים ולרווחתם.
                </p>
                <p>
                    <b>החברה בטוחה כי מדיניות זו של משרד התקשורת להעמקת התחרותיות בשוק תימשך ותבטיח את הצלחת המתחרים החדשים. </b>
                    <br>
                    החזון של  <b>גולן טלקום  </b>הוא להביא לשוק הישראלי מהפכה סלולרית צרכנית.
                    בעלי המניות ומנהלי הקבוצה כבר הוכיחו את יכולתם במהפכות הצרכניות שחוללו והובילו לטובת קהל לקוחות התקשורת בצרפת ובישראל. <br>
                    אבני היסוד עליהן תושתת <b>גולן טלקום </b>כוללות את הגברת התחרותיות, טכנולוגיה חדשנית, מוצרים מתקדמים, שירות איכותי ומעל הכול ירידה דרמטית במחיר לצרכן באמצעות חבילות פשוטות וברורות ללקוח.

                </p>
                <p>
                    <b>הערבות הבנקאית שנמסרה היום למשרד התקשורת הונפקה על ידי </b> בנק מזרחי טפחות.
                    גולן טלקום מודה להנהלת הבנק ולחברי הצוות אשר הפגינו מקצוענות, זריזות ויעילות תוך הבעת אמון  בעתיד השוק הסלולארי הישראלי ובגולן טלקום כמפעיל סלולרי חדש. <br>
                    תודות שלוחות גם לבנקים האחרים אשר נענו במהירות ובשירותיות ראויה לציון, לצורך של גולן טלקום להציג ערבות בנקאית למשרד התקשורת. בנקים אלה יהוו ללא ספק,  נדבך חשוב במילוי הצרכים הבנקאיים של החברה בהמשך הדרך. <br>
                    עו"ד פטריק בן  זמרה וצוותו ייצגו את גולן טלקום בהתקשרות עם בנק מזרחי טפחות.   <br>
                    <b>גולן טלקום </b>החלה בפעילות גיוס עובדי המפתח בתחומי ההנדסה, הטכנולוגיה ומערכות המידע כדי לעמוד באתגר של בניית הרשת הסלולארית הבאה של ישראל. המועמדים מוזמנים לשלוח קו"ח לכתובת : HR@golantelecom.co.il
                    <br>
                    גולן תקשורת מודה לכל אותם ישראלים רבים אשר הפגינו תמיכה בחברה בשבועות האחרונים ואנו נפגוש אותם בשוק ב- 2012.
                </p>
            </article>
            <article id="article03" class="modal-content">
                <h4>חברת גולן טלקום, המפעיל הסלולרי החדש, חתמה על
                    הסכם נדידה פנים ארצי עם חברת סלקום
                </h4>
                <br><br>
                <p>
                    חברת גולן טלקום, המפעיל הסלולרי החדש, חתמה על הסכם נדידה פנים ארצי עם חברת  <b>סלקום. </b>
                    הסכם הנדידה הפנים ארצי, יאפשר ללקוחות <b>גולן טלקום </b>ליהנות מכיסוי סלולרי כלל ארצי מיד עם תחילת פעילותה של החברה, המתוכננת בשנת 2012. <br><br>
                    שיתוף הפעולה בין גולן טלקום לסלקום מביא לידי יישום את מדיניות משרד התקשורת לאפשר כניסה של מפעילים סלולריים חדשים במציאות שבה תהליך הרישוי של אתרי בסיס חדשים הינו ארוך ומורכב, ומהווה חסם כניסה לשוק. <br>
                    ההסכם שנחתם בין החברות כולל בתוכו גם שיתוף אתרים סלולריים, שיאפשר לגולן טלקום, שהחלה להקים תשתית סלולרית כלל ארצית עצמאית, להציב  תאי שידור שלה על גבי תרנים קיימים של סלקום ברחבי הארץ. <br><br>
                    הסכם שיתוף האתרים תואם את מדיניותה של גולן טלקום לנצל תרנים קיימים  ככל האפשר במטרה להאיץ את הקמת התשתית העצמאית שלה תוך התחשבות בשמירת פני הסביבה ככל שניתן.
                    גולן טלקום מודה לחברי הצוות של סלקום על המקצוענות והשירותיות שגילו לאורך העבודה על הסכם הנדידה הפנים ארצי.
                </p><br><br>
                <p><b>לפרטים נוספים : ינון הראל – הראל-מורדי תקשורת שיווקית משולבת</b><br><b> 03-6090906 || 0522688111</b></p>
            </article>
            <article id="article04" class="modal-content">
                <h3>לתחרות יש קידומת - 058 :</h3>
                <h4>משרד התקשורת העניק קידומת ללקוחות גולן טלקום - 058</h4>
                <br><br>
                <p>
                    משרד התקשורת, המנהל את נושא המיספור , הודיע בימים האחרונים כי 058 היא הקידומת החדשה בשוק הסלולר. לקוחות גולן טלקום יהיו בעלי מספרים בפורמט 058 XXX XX XX .
                    <br><br>
                    בעידן ניידות המספרים, לקוחות שיעברו ממפעיל קיים לגולן טלקום יוכלו לעשות זאת תוך שמירת מספר הטלפון המקורי שלהם.
                    <br><br>
                    על פי הערכות שונות בשוק התקשורת, מיליוני לקוחות כבר התניידו בין החברות הסלולריות ושיעור הנטישה לצורך נדידה צפוי לגדול עם כניסת גולן טלקום לשוק.
                    במהלך 2012 תתחיל חברת<b> גולן טלקום </b>את המהפכה  לטובת הצרכן הסלולרי ועבורו.
                    <br><br>
                    חברת גולן טלקום מבקשת להודות למשרד התקשורת על המהירות והיעילות לאורך כל שלבי העבודה מולו המסייע לנו להגיע לקו הזינוק במהלך 2012 ולשנות את שוק התקשורת בישראל עבור הצרכן הישראלי עם מהפכה אמיתית.
                </p>
            </article>
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
        <button class="nav-list-mobile"><p></p><a href="#contact-us-mobile">צור קשר</a></button>
        <section id="contact-us-mobile">
            <span class="line"><h3>רוצים לקחת חלק במהפכה?</h3></span>
            <span class="side-line"></span>
            <span class="title-icon"></span>
            <section>
                <form>
                    <label>אני</label>
                    <input type="text" placeholder="שם/חברה">
                    <input type="text" placeholder="חברה">

                    <label>ניתן להשיג אותי:</label>
                    <input type="email" placeholder="E-Mail">
                    <input type="tel" placeholder="נייד">

                    <span>היום אני מנוי של:</span>
                    <input type="radio" name="" value="spain">
                    <label >סלקום</label>
                    <input type="radio" name="" value="ashkenaz">
                    <label>פלאפון</label>
                    <input type="radio" name="interests[]" value="else">
                    <label>אורנג'</label>
                    <input type="radio" name="interests[]" value="else">
                    <label>מירס</label>

                    <br>

                    <span>אני לקוח:</span>
                    <input type="radio" name="gender" value="female">
                    <label>מרוצה</label>
                    <input type="radio" name="gender" value="male">
                    <label>לא מרוצה</label>

                    <label>החשבון האחרון שלי:</label>
                    <input type="number" placeholder="רשום סכום">
                    <br>

                    <span>מעוניין ש:</span>
                    <label>[סמן כל מה שמתאים לך]</label>
                    <input type="checkbox" name="interests[]" value="spain">
                    <label >להיות בין ראשוני הלקוחות</label>
                    <input type="checkbox" name="interests[]" value="ashkenaz">
                    <label>להתנסות בשירותכם החדשים לכשיופעלו</label>
                    <input type="checkbox" name="interests[]" value="else">
                    <label>צרו עימי קשר</label>

                    <input type="submit" value="שלח">
                    <p>* לתשומת לבך אנו מתנצלים על משך זמן המענה עקב ריבוי הפניות</p>

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
