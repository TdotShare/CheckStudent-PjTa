let scanner;
$("#preview").hide();
var vueIndex = new Vue({
    el: '#student-checkin',
    data: {
        scanner: null,
        student: [],
        message: 'test vueJs'
    },
    methods: {
        StartScanner: function () {
            if (!scanner) {
                $("#preview").show("slow");
                scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

                scanner.addListener('scan', function (content) {
                    vueIndex.getStudent()
                });
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
            } else {
                alert("เริ่มสแกนแล้ว !");
            }
        },
        StopScanner: function () {
            if (scanner) {
                scanner.stop();
                scanner = null
                $("#preview").hide();

            } else {
                alert("ปิดการทำงานแล้ว !");
            }
        },
        getStudent: function () {
            axios.get('./service/controller/getstudent/index.php')
                .then(function (response) {
                    //console.log(response.data)
                    let arr = vueIndex.student;

                    for (let index = 0; index < response.data.length; index++) {
                        arr.push(response.data[index])
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
})