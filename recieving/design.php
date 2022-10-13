<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// require_once "config.php";
//     $customer_result = mysql_query("SELECT * FROM orders");
//     $scustomers = mysql_query("SELECT cust_name, number, date, time, emp_name, colors, text, design, comments, paid FROM orders WHERE date = 2022-09-30;");
//     echo("$scustomers");
//             function delete($name) {
//             $sql = "DELETE FROM 'orders' where cust_name = $name;";
//             ?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #sidebar {
            position: fixed;
            width: 200px;
            height: 100%;
            background: rgb(255, 255, 255);
            left: 0px;
            transition: all 500ms linear;
        }

        body {
            margin: 0;
            padding: 0;
            background: rgb(255, 0, 0);
            color: black;
            font-family: sans-serif;
        }

        #middle {
            position: absolute;
            left: 200px;
            width: calc(100% - 200px);
            height: 100%;
            background: rgb(255, 255, 255);
            transition: all 500ms linear;
        }

        #right {
            position: absolute;
            left: 800px;
            width: calc(50% - 100px);
            height: 100%;
            background: rgb(255, 255, 255);
            transition: all 500ms linear;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="design.php">Design</a></li>
            <li><a href="https://www.ghernandez.org/ordering">Ordering</a></li>
            <li><a href="numbers.php">Employee Numbers</a></li>
            <li><a href="archive.php">Archive</a></li>
            <li><a href="support.php">Support</a></li>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </ul>
    </div>
    <div id="middle">
    <h1>Please Enter Design Code</h1>
    <input type="text" id="code" autofocus>
    <button id="submit">Submit</button>
    <h1>If no image is shown after pressing submit, the design may be from the old catalog.</h1>
    </div>
    <div id="right"> 
    <div id="image"></div>
    </div>
    <script>
        /* global $, sessionStorage */

        $(document).ready(runProgram); // wait for the HTML / CSS elements of the page to fully load, then execute runProgram()

        function runProgram() {
            // Constant Variables
            var FRAME_RATE = 60;
            var FRAMES_PER_SECOND_INTERVAL = 1000 / FRAME_RATE;

            // Game Item Objects
            var list = [
                {
                    id: "O4042",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CookieCake_SummerVibesOnlyPineapple_KO-1200x800-c6f5639.jpg"
                },
                {
                    id: "O0412",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-HaveAGreatSummer-O4012-640x640-86244f3.jpg"
                },
                {
                    id: "O4041",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Pool_Time.jpg"
                },
                {
                    id: "O4040",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-ThankYou_ThanksALatte-O4040-640x640-86244f3.jpg"
                },
                {
                    id: "O4035",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/March_On.jpg"
                },
                {
                    id: "O4030",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_Cake_Watermelon-1400x800-675b640-1.jpg"
                },
                {
                    id: "O4013",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/FamilyReunion_D1008_sm-1400x800-7332283-1.jpg"
                },
                {
                    id: "O4029P",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BonVoyage-rectangle-O4029-640x640-86244f3.jpg"
                },
                {
                    id: "O4028",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-FirstSleepover-O4028-640x640-86244f3.jpg"
                },
                {
                    id: "O4020",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-GirlsNightOut-O4020-1400x800-e7bfd1b.jpg"
                },
                {
                    id: "O4019",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-SadToSeeYouGo-O4019-640x640-86244f3.jpg"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-GoodLuckBestWishes-O4018-1400x800-86244f3.jpg",
                    id: "O4018"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-JustToBrightenYourDay-O4017-640x640-86244f3.jpg",
                    id: "O4017"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BestFriendsForever-O4016-800x800-e7bfd1b.jpg",
                    id: "O4016"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-YoureTheBest-O4011-800x800-e7bfd1b.jpg",
                    id: "O4011"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-Ribbon-O4010-800x800-e7bfd1b.jpg",
                    id: "O4010"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-PigOut-O4009-640x640-86244f3.jpg",
                    id: "O4009"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-PokerNight-O4008-943x800-92ea6e3.jpg",
                    id: "O4008"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-ThankYou_ANoteOfThanksMusicNotes-O4006-800x800-e7bfd1b.jpg",
                    id: "O4006"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-GetWell_GetWellSoonFromTheBunch-O4005-640x640-86244f3.jpg",
                    id: "04005"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BreakALeg-O4039-640x640-86244f3.jpg",
                    id: "O4039"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Prom.jpg",
                    id: "O4024"
                },
                {
                    id: "B1004",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/4cb8a30b2fa44e5995be753429d8fb22.png"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/CookieCake_HappyBdayOlivia_Silo_403_KO-500x500-050dd60.png",
                    id: "B1030"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_Cake_Dude-1400x800-52d7dbc-1.jpg",
                    id: "B1041"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBD29Forever-B1038-800x800-e7bfd1b-1.jpg",
                    id: "B1038"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HBD-Jenny.jpg",
                    id: "B1037"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDFirstBday-B1025-1400x800-86244f3.jpg",
                    id: "B1025"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HBD-Dump-Truck.jpg",
                    id: "B1036"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDCrown-B1028-640x640-86244f3-1.jpg",
                    id: "B1028"
                },
                {
                    id: "B1035",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Popcorn-HBD.jpg"
                },
                {
                    id: "B1039",
                    img: 'https://www.greatamericancookies.com/wp-content/uploads/2021/08/BirthdayBBall_2016-1400x800-d117e07.jpg'
                },
                {
                    id: "B1029",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Little-Monster.jpg"
                },
                {
                    id: "B1034",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Fish.jpg"
                },
                {
                    id: "B1027",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDBoot-B1027-640x640-86244f3-1.jpg"
                },
                {
                    id: "B1026",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDGuitar-B1026-640x640-fac4a00-1.jpg"
                },
                {
                    id: "B1023",
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDMotorcycle-B1023-500x500-55e3268.png"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-1stDay_BackToTheBooks-S3402-640x640-86244f3.jpg",
                    id: "S3402"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/WelcomeStudents_C712-1400x800-65b8318.jpg",
                    id: "S3401"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Hats-Off-to-the-Grad.jpg",
                    id: "S3009"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Graduation_CongratsGradCapGown-rectangle-S3008P-640x640-f4201a6.jpg",
                    id: "S3008"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Graduation_AimForTheStars-S3004-640x640-86244f3.jpg",
                    id: "S3004"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Tassel-Hassle.jpg",
                    id: "S3002"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Graduation_CongratsGrad-rectangle-S3001P-640x640-7ae3db1.jpg",
                    id: "S3001"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Graduation-Books-and-tassel.jpg",
                    id: "S3017"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/GAC_CookieCake_Graduation_Smile_Emoji_Round_S3005-600x600-4bac2fa.png",
                    id: "S3005"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Look-Whos-Graduated.jpg",
                    id: "S3006"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/GAC_CookieCake_Graduation_Diploma_Rectangle_Pan_S3015-600x600-817070c.png",
                    id: "S3018"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Graduate-and-Diploma.jpg",
                    id: "S3010"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/GAC_CookieCake_Graduation_ClassofBlock_Square_Fudge_-600x600-3766610.png",
                    id: "S3019"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Graduation-Math-Worm.jpg",
                    id: "S3012"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Sports_FootballFever-S3503-640x640-86244f3.jpg",
                    id: "S3503"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Lets-Kickoff-the-Season-Football.jpg",
                    id: "S3510"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Sports_ScoreBasketball-S3509-640x640-86244f3-1.jpg",
                    id: "S3509"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Good-Luck-Team-Baseball.jpg",
                    id: "S3508"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SchoolSports-Sports_GoTeamFootballHelmet-S3506-640x640-86244f3.jpg",
                    id: "S3506"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Goal.jpg",
                    id: "S3505"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/FootBall.jpg",
                    id: "S3504"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Great-Season.jpg",
                    id: "S3502"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Cheerleaders.jpg",
                    id: "S3501"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/14-Jeep-1400x800-1c144be-1.jpg",
                    id: "B1022"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Pirate-Ship-Happy-Birthday.jpg",
                    id: "B1021"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/PrincessCake.jpg",
                    id: "B1019"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Caterpillar-and-Butterfly-1014.jpg",
                    id: "B1014"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HappyBirthday_PainterPalette-1400x800-786b77c.jpg",
                    id: "B1032"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HappyBirthday_RollerSkates-1400x800-1de9d9a-1.jpg",
                    id: "B1031P"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDIsland-B1013-640x640-86244f3-1.jpg",
                    id: "B1013"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDAnchor-B1033-800x800-518e1a5-1.jpg",
                    id: "B1033"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDOvertheHill-B1012-500x500-55e3268.png",
                    id: "B1012"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/BDayBalletSlippersPink_C520-1400x800-1a5fb01-1.jpg",
                    id: "B1010"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/BDayRocketColor_A517-1400x800-e601024-1.jpg",
                    id: "B1009"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/BDayTrainColor_A515-1400x800-b977590-1.jpg",
                    id: "B1008"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/f4bc287ec0424828bed83fe02b66555f-1.png",
                    id: "B1007"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_HBDButterflies-B1006-640x640-86244f3-1.jpg",
                    id: "B1006"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Happy-Birthday_Dinosaur_800px-800x800-518e1a5-1.jpg",
                    id: "B1005"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Horse-Flowers.jpg",
                    id: "B1003"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Tim.jpg",
                    id: "B1018"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/0244c7b0a49f4859b8b786d834943ac4.png",
                    id: "B1024"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HBD-Mermaid.jpg",
                    id: "B1040"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BossesDay-FromTheBunch-O4025-640x640-86244f3.jpg",
                    id: "O4025"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BossesDay-HappyBossesDayCoffeeCup-O4027-800x800-e7bfd1b.jpg",
                    id: "O4027"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-BossesDay-ToTheBigCheese-O4026-800x800-e7bfd1b.jpg",
                    id: "O4026"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-HappyNursesDay-O4022-640x640-86244f3.jpg",
                    id: "O4022"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Gender_Reveal.jpg",
                    id: "O4036"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/ItsAGirl-Elephant-CC-1400x800-5e6311a.jpg",
                    id: "O4038"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Its_A_Girl.jpg",
                    id: "O4402"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/ItsABoy_4003sm-1400x800-2ab6356.jpg",
                    id: "O4003"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_SpecialOcc-Baby_AhoyItsABoy-O4037-640x640-50dd4e3.jpg",
                    id: "O4037"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/WelcomeBaby_D802_sm-1400x800-e818dd2.jpg",
                    id: "O4004"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/CC_HalloweenDog_KO-1400x800-ff08576-1.jpg",
                    id: "HF2568"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/CC_HalloweenCat_KO-1400x800-439978f-1.jpg",
                    id: "HF2569"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_HappyHalloweenZombie-HF2563-640x640-86244f3.jpg",
                    id: "HF2563"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_HappyhalloweenGhostPumpkin-rectangle-HF2562P-640x640-3ae6d0b.jpg",
                    id: "HF2562"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_HappyHalloweenCatFence-HF2557-640x640-86244f3.jpg",
                    id: "HF2557"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_TrickOrTreatSkeleton-HF2554-640x640-86244f3.jpg",
                    id: "HF2554"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_HappyHalloweenGhostPumpkin-HF2558-1400x800-86244f3.jpeg",
                    id: "HF2558"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Halloween_Bats-HF2551-640x640-86244f3.jpg",
                    id: "HF2551"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Happy-Halloween-Spider.jpg",
                    id: "HF2565"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_TurkeyHappyThanksgiving-HF2654-1000x800-4637ebe.jpg",
                    id: "HF2654"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Fall_HappyFallPumpkins-HF2561-640x640-86244f3-1.jpg",
                    id: "HF2561"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Fall_ThankfulGrateful-HF2656-640x640-86244f3.jpeg",
                    id: "HF2656"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HappyThanksgivingOwl.jpg",
                    id: "HF2657"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/55bfc8ddd2554b7aad4ca1062dcc9f1c.png",
                    id: "HW2839"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Hannukah_Menorah-HW2752-640x640-86244f3.jpg",
                    id: "HW2752"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/Snowman_Silo_170_RT_KO-round-600x600-345ac93.png",
                    id: "HW2842"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_MerryChristmasStockings-HW2833-640x640-86244f3.jpeg",
                    id: "HW2833"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/MerryXmasSnow.jpg",
                    id: "HW2827"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Holly-Berries_B926-500x500-b593a68.png",
                    id: "HW2809"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_HappyHolidays_HW2815-800x694-c9caaba.jpg",
                    id: "HW2815"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_PeaceLoveJoy_KO-1400x800-167e341.jpg",
                    id: "HW2835"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_MerryChristmasSnowman-HW2821-640x640-86244f3.jpeg",
                    id: "HW2821"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_MerryChristmas_SnowGlobe_KO-1400x800-519e080.jpg",
                    id: "HW2840"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Snowmen.jpg",
                    id: "HW2807"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/MerryXmas.jpg",
                    id: "HW2834"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_Christmas_Truck_Olo_1200x800-1400x800-7b8fb1f.jpg",
                    id: "HW2838P"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_HappyHolidaysPenguin-HW2818-640x640-86244f3.jpeg",
                    id: "HW2818"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_SeasonGreetingsWeb-HW2825-640x640-86244f3.jpeg",
                    id: "HW2825"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_MerryChristmasPenguinHat-HW2831-640x640-86244f3.jpeg",
                    id: "HW2831"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_MeowyChristmas-HW2832-640x640-86244f3.jpeg",
                    id: "HW2832"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/SeasonsGreetings.jpg",
                    id: "HW2812"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Christmas_HappyHolidaysGingerbreadHouse-HW2810-640x640-86244f3.jpeg",
                    id: "HW2810"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/GACC_Holiday_ChristmasGift_KO-copy-600x600-1791549.png",
                    id: "HW2841P"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/07/1af5d264bc31451092f4ac7c6a3654e9.jpg",
                    id: "HW2805"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Cheers-HW2902.jpg",
                    id: "HW2902"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-NewYear_HappyNewYearChampagne-HW2901-640x640-86244f3.jpeg",
                    id: "HW2901"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_BeMyValentine_HV2005_KO-500x500-ef970f2.png",
                    id: "HV2005"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/ValentinesCakes_Silo_028_KO-500x500-8ca31c9.png",
                    id: "HV2002"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_BeeMine-HV2007-640x640-86244f3.jpg",
                    id: "HV2007"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_BeMineHeartDog-HV2028-640x640-86244f3.jpg",
                    id: "HV2028"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Vday.jpg",
                    id: "HV2047"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ImASuckerForYou-HV2048-640x640-86244f3.jpg",
                    id: "HV2048"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ILoveYouToTheMoonAndBack-HV2029-640x640-86244f3.jpg",
                    id: "HV2029"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_YourePurrrfect-HV2045-640x640-86244f3.jpg",
                    id: "HV2045"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_IHeartYouBold-HV2009-640x640-86244f3.jpg",
                    id: "HV2009"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/CookieCakes_TeAmo_060_KO-500x500-36f742c.png",
                    id: "HV2030"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/CookieCake_IHeartU_KO-500x500-6429e4b.png",
                    id: "HV2001"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_YoureMyMainSqueezeSnake-HV2044-640x640-86244f3.jpg",
                    id: "HV2044"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_YouMakeMyHeartSing-HV2043-640x640-86244f3.jpg",
                    id: "HV2043"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ImNotLionILoveYou-HV2041-640x640-86244f3.jpg",
                    id: "HV2041"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ImCrazyAboutYou-HV2040-640x640-86244f3.jpg",
                    id: "HV2040"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Love-_2.jpg",
                    id: "HV2038"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_YoureFoxy-HV2037-640x640-86244f3.jpg",
                    id: "HV2037"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ILoveYouToPieces-HV2035-640x640-86244f3.jpg",
                    id: "HV2035"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_HookedOnYou-HV2034-640x640-86244f3.jpg",
                    id: "HV2034"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_BeMyLoveBug-HV2027-640x640-86244f3.jpg",
                    id: "HV2027"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_MyHeartBeatsForYou-HV2026-640x640-86244f3.jpg",
                    id: "HV2026"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_BeMine2Hearts-HV2025-640x640-86244f3.jpg",
                    id: "HV2025"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_BeMine-HV2021-640x640-86244f3.jpg",
                    id: "HV2021"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Ilovethis_much.jpg",
                    id: "HV2020"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/You-Set-my-heart-on-fire.jpg",
                    id: "HV2019"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_YouRockMyWorld-HV2018-500x500-6c5d265.png",
                    id: "HV2018"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_SendingYourMyLove-HV2017-640x640-86244f3.jpg",
                    id: "HV2017"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_IGiveYouMyHeart-HV2012-640x640-ca30ccd-1.jpg",
                    id: "HV2012"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_EatYourHeartOut-HV2011-640x640-86244f3.jpg",
                    id: "HV2011"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_WillYouMarryMe-HV2032-640x640-86244f3.jpg",
                    id: "HV2032"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_HappyValentinesDay-HV2010-800x800-e7bfd1b.jpg",
                    id: "HV2010"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_ILoveYouBold-HV2008-640x640-86244f3.jpg",
                    id: "HV2008"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_HugsKissesXOXO-HV2006-640x640-86244f3.jpg",
                    id: "HV2006"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_PuppyLove-HV2004-640x640-86244f3.jpg",
                    id: "HV2004"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-VDay_KissMeYouFool-HV2003-640x640-86244f3.jpg",
                    id: "HV2003"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-StPats_HappyStPatricksDay-HS2202-640x640-86244f3.jpg",
                    id: "HS2202"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-StPats_KissMeImIrish-HS2201-640x640-86244f3.jpg",
                    id: "HS2201"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_Easter_2ChicksEgg-1400x800-1dba6a1.jpg",
                    id: "HS2256"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Happy-Easter-Cross.jpg",
                    id: "HS2254"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Easter-Colorful-Chick-in-Egg.jpg",
                    id: "HS2253"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_ShakeYourCottonTail_OH_201_KO_1500px-1400x800-f20f6b6.jpg",
                    id: "HS2255"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-Easter_HappyEasterBunny-HS2251-640x640-86244f3.jpg",
                    id: "HS2251"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/HappyEaster_ChickInEgg_15-1400x800-a17aee2.jpg",
                    id: "HS2252"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_ToTheBearyBestMom-HS2302-640x640-86244f3-1.jpg",
                    id: "HS2302"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_Swirly-Square-HS2317S-640x640-86244f3.jpg",
                    id: "HS2317"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_MomLoveYouLlots_HS2322-800x800-e7bfd1b-1.jpg",
                    id: "HS2322"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_HappyMothersDayGerberDaisy-HS2305-640x640-86244f3-1.jpg",
                    id: "HS2305"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_Holiday_MothersDayRose_KO-500x500-21ae657.png",
                    id: "HS2311"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_EnjoyYourDayFlipFlop-HS2303-640x640-86244f3.jpg",
                    id: "HS2303"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_ILoveMom-HS2306-640x640-86244f3.jpg",
                    id: "HS2306"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_FlowerButterfly-HS2318-640x640-86244f3-1.jpg",
                    id: "HS2318"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_WeLoveYou-HS2315-640x640-4552f5d.jpg",
                    id: "HS2315"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_PinkPattern-HS2320-640x640-86244f3.jpg",
                    id: "HS2320"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Youre-Stuck-With-Us-Mom-1.jpg",
                    id: "HS2323"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-MothersDay_FlowersBirds-HS2316-640x640-86244f3-1.jpg",
                    id: "HS2316"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Dad-Youre-Out-of-This-World.jpg",
                    id: "HS2425"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_DAD_BestPopEver_RD_OCC-1200x800-8154dce-1.jpg",
                    id: "HS2424"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_DadYouRock-HS2403-640x640-86244f3-1.jpg",
                    id: "HS2403"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_YoureFlippingAwesome-HS2419-640x640-86244f3-1.jpg",
                    id: "HS2419"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Moustache-and-Bow-Tie.jpg",
                    id: "HS2415"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDayHammock-HS2409-640x640-86244f3-1-1.jpg",
                    id: "HS2409"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Happy-Fathers-Day-Football.jpg",
                    id: "HS2420"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDayCamping-HS2418-640x640-86244f3-1.jpg",
                    id: "HS2418"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDayGolf-HS2410-640x640-86244f3-1-1.jpg",
                    id: "HS2410"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GACC_DadYoureReely_HS2423-800x800-e7bfd1b-1.jpg",
                    id: "HS2423"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Grill.jpg",
                    id: "HS2407"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_DadsCanFixAnything-HS2405-640x640-86244f3-1-1.jpg",
                    id: "HS2405"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDayRecliner-HS2413-640x640-86244f3-1-1.jpg",
                    id: "HS2413"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/Best-Dad-In-the-World.jpg",
                    id: "HS2404"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDaySmileyTie-HS2408-640x640-86244f3-1.jpg",
                    id: "HS2408"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_YoureAWinner-HS2402-640x640-86244f3-1-1.jpg",
                    id: "HS2402"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CC_Holiday-FathersDay_HappyFathersDayTennis-HS2406-640x640-86244f3-1.jpg",
                    id: "HS2406"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/2-Fourth-1400x800-4e824d7.jpeg",
                    id: "HS2503"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/GAC_CookieCake_July4_LetFreedomRing_KO-1200x800-c6f5639.jpg",
                    id: "HS2505"
                },
                {
                    img: "https://www.greatamericancookies.com/wp-content/uploads/2021/08/US-Flag-1.jpg",
                    id: "HS2502"
                }
                
            ]

            // one-time setup
            var interval = setInterval(newFrame, FRAMES_PER_SECOND_INTERVAL);   // execute newFrame every 0.0166 seconds (60 Frames per second)
            function newFrame() {


            }

            /* 
            Called in response to events.
            */
            $("#submit").click(examineCode);
            function examineCode() {
                    $("#img").remove();
                    for (i = 0; i < list.length; i++) {
                        if (list[i].id === $("#code").val()) {
                            var img = $('<img id="img">');
                            img.attr('src', list[i].img);
                            img.appendTo('#image');
                        }
                    }
            }

        }
    </script>
</body>

</html>