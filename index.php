<head>
    <title>ProJect_Ta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/commonStyle.css">
    <?php include './Library/script.php'; ?>
</head>

<body>
    <div id="student-checkin">
        <div class="container">

            <?php
            $title = "เช็คชื่อผ่านเว็บแคมด้วย QRCODE";
            include './components/header.php';
            ?>

            <div class="row">
                <div class="col ">
                    <center>
                        <div style="padding: 5px;">
                            <button type="button" class="btn btn-primary" @click="StartScanner">เริ่มแสกน</button>
                            <button type="button" class="btn btn-primary" @click="StopScanner">หยุดสแกน</button>
                        </div>
                        <video id="preview" class="boxPreview"></video>
                    </center>
                </div>
                <div class="col">
                    <center>
                        <span>แสดงข้อมูลนักเรียน</span>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">รหัส</th>
                                        <th scope="col">ชื่อจริง</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">ชั้นปี</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in student">
                                        <th scope="row">{{index + 1}}</th>
                                        <td>{{item.code}}</td>
                                        <td>{{item.fname}}</td>
                                        <td>{{item.lname}}</td>
                                        <td>{{item.level}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="./js/indexController.js"></script>

</html>