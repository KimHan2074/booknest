
   // -----------------------JS để chỉnh sửa AVT nhà tuyển dụng-----------------------------
   
   
//    // JS ẩn hiện các phần khi nhấn vào menu
//    document.getElementById("home-button").addEventListener("click", function () {
//        document.getElementById("dashboard").style.display = "block";
//        document.getElementById("personal-info").style.display = "none";
//        document.getElementById("job-list").style.display = "none";
//     //    document.getElementById('applicant-list').style.display = 'none';
//        document.getElementById('applicant-detail').style.display = 'none';
//        document.getElementById('create-job-form1').style.display = 'none';
//        document.getElementById('create-job-form2').style.display = 'none';
//        document.getElementById('create-job-form3').style.display = 'none';
//    });
//    document.getElementById("profile-button").addEventListener("click", function () {
//        document.getElementById("dashboard").style.display = "none";
//        document.getElementById("personal-info").style.display = "block";
//        document.getElementById("job-list").style.display = "none";
//     //    document.getElementById('applicant-list').style.display = 'none';
//        document.getElementById('applicant-detail').style.display = 'none';
//        document.getElementById('create-job-form1').style.display = 'none';
//        document.getElementById('create-job-form2').style.display = 'none';
//        document.getElementById('create-job-form3').style.display = 'none';
   
//    });
//    document.getElementById("job-list-button").addEventListener("click", function () {
//        document.getElementById("dashboard").style.display = "none";
//        document.getElementById("personal-info").style.display = "none";
//        document.getElementById("job-list").style.display = "block";
//     //    document.getElementById('applicant-list').style.display = 'none';
//        document.getElementById('applicant-detail').style.display = 'none';
//        document.getElementById('create-job-form1').style.display = 'none';
//        document.getElementById('create-job-form2').style.display = 'none';
//        document.getElementById('create-job-form3').style.display = 'none';
   
//    });
   
   // --------------------------JS ẩn hiện các phần khi nhấn vào menu---------------------------
   
   
   // JS để thêm class active khi nhấn vào menu
//    const menuItems = document.querySelectorAll('.sidebar .menu ul li a');
//    menuItems.forEach(item => {
//        item.addEventListener('click', () => {
//            menuItems.forEach(i => i.parentElement.classList.remove('active'));
//            item.parentElement.classList.add('active');
//        });
//    });
    
   
   document.addEventListener("DOMContentLoaded", () => {
//     //    const addNewJobBtns = document.querySelector("#add-new-job-btn");
//        const viewBtns = document.querySelectorAll(".btn-view");
//     //    const jobList = document.getElementById("job-list");
//        const applicantList = document.getElementById('applicant-list');
//        const applicantDetail = document.getElementById("applicant-detail");
    //    const createJobForm1 = document.getElementById("create-job-form1");
    //    const createJobForm2 = document.getElementById("create-job-form2");
    //    const createJobForm3 = document.getElementById("create-job-form3");
    //    const nextFirstFormBtn = document.querySelector("#next-btn1");
    //    const nextSecondFormBtn = document.querySelector("#next-btn2");

        // Nút xem đơn ứng tuyển
    //    viewBtns.forEach((btn) => {
    //     btn.addEventListener("click", () => {
    //         applicantList.style.display = "none";
    //         applicantDetail.style.display = "block";
    //       });
    //   });
      //  Nút tạo job mới
    //    addNewJobBtns.addEventListener("click", () => {
    //         //    createJobForm1.style.display = "block";
    //         //    jobList.style.display = "none";
    //            applicantList.style.display = "none";
    //            applicantDetail.style.display = "none";
    //        });
      //  Nút tiếp theo đầu tiên
    //    nextFirstFormBtn.addEventListener("click", () => {
    //      createJobForm1.style.display = "none";
    //      createJobForm2.style.display = "block";
    //     });
        // Nút tiếp theo thứ 2
        // nextSecondFormBtn.addEventListener("click", () => {
        //   createJobForm2.style.display = "none";
        //   createJobForm3.style.display = "block";
        // });

        const bachToHome = document.querySelectorAll('#add-new-job-btn');

        bachToHome.forEach((btn) => {
            btn.addEventListener("click", () => {
                window.location.href = 'http://localhost/job_finder_website/recruiter/recruiter';
              });
          });
   });
   
