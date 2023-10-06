// var coll = document.getElementsByClassName("collapsible")
// var i

// for (i = 0; i < coll.length; i++) {
//     coll[i].addEventListener("click", function () {
//         this.classList.toggle("active")
//         var content = this.nextElementSibling
//         if (content.style.display === "block") {
//         content.style.display = "none"
//         } else {
//         content.style.display = "block"
//         }
//     })
// }


// // test
// console.log("test")


// document.getElementById('dropdownLeftStartButton')?.addEventListener("click", function () {
//     document.getElementById("dropdownLeftStart").classList.toggle("show")

//     if(document.getElementById("dropdownLeftStart").classList.contains("show")){
//         document.getElementById("dropdownInformation").classList.remove("show")
//     }

// })

// document.getElementById('dropdownInformationButton')?.addEventListener("click", function () {
//     document.getElementById("dropdownInformation").classList.toggle("show")

//     if(document.getElementById("dropdownLeftStart").classList.contains("show")){
//         document.getElementById("dropdownLeftStart").classList.remove("show")
//     }
// })

// document.querySelector('.addmodal')?.addEventListener("click", function () {
//     document.getElementById("authentication-add").classList.toggle("show")

//     if (document.getElementById("authentication-add").classList.contains("show")) {
//         document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
//             element.addEventListener("click", function () {
//                 document.getElementById("authentication-add").classList.remove("show")
//             })
//         })
//     }
//         document.querySelectorAll(".btn-prev")?.forEach(function (element) {
//             element.addEventListener("click", function () {
//                 document.getElementById("authentication-add").classList.remove("show")
//             })
//         })
// })

// document.querySelector(".button-add")?.addEventListener("click", function () {
//   document.getElementById("authentication-add").classList.toggle("show")

//   if (
//     document.getElementById("authentication-add").classList.contains("show")
//   ) {
//     document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
//       element.addEventListener("click", function () {
//         document.getElementById("authentication-add").classList.remove("show")
//       })
//     })
//   }
//   document.querySelectorAll(".btn-prev")?.forEach(function (element) {
//     element.addEventListener("click", function () {
//       document.getElementById("authentication-add").classList.remove("show")
//     })
//   })
// })


// document.querySelectorAll('.bx.bxs-edit-alt').forEach(update => {
//     update.addEventListener('click', function () {
//         document.getElementById("authentication-update").classList.toggle("show")

//         if (
//             document.getElementById("authentication-update").classList.contains("show")
//         ) {
//             document.querySelectorAll(".bx.bx-x").forEach(function (element) {
//                 element.addEventListener("click", function () {
//                     document
//                         .getElementById("authentication-update")
//                         .classList.remove("show")
//                 })
//             })
//         }
//         document.querySelectorAll(".btn-prev").forEach(function (element) {
//             element.addEventListener("click", function () {
//                 document.getElementById("authentication-update").classList.remove("show")
//             })
//         })
//     })
// })


// document.querySelectorAll(".bx.bxs-edit").forEach(update => {
//     update?.addEventListener("click", function () {
//         document.getElementById("authentication-update").classList.toggle("show")

//         if (
//             document.getElementById("authentication-update").classList.contains("show")
//         ) {
//             document.querySelectorAll(".bx.bx-x").forEach(function (element) {
//                 element.addEventListener("click", function () {
//                     document
//                         .getElementById("authentication-update")
//                         .classList.remove("show")
//                 })
//             })
//         }
//         document.querySelectorAll(".btn-prev").forEach(function (element) {
//             element.addEventListener("click", function () {
//                 document.getElementById("authentication-update").classList.remove("show")
//             })
//         })
//     })
// })

// document.querySelector(".block")?.addEventListener("click", function () {
//     document.querySelector(".bg-white").style.display = "none"
//     document.querySelector(".text-gray-700").style.display = "none"

//     if (document.querySelector(".bg-white").style.display === "none" && document.querySelector(".text-gray-700").style.display === "none") {
//         document.getElementById("edit").style.display = "block"
//         document.querySelector(".grid-form").style.display = "block"
//     }

//     document.querySelectorAll(".btn-prev").forEach(function (element) {
//         element.addEventListener("click", function () {
//             document.querySelector(".bg-white").style.display = "block"
//             document.querySelector(".text-gray-700").style.display = "block"

//             if(document.querySelector(".bg-white").style.display === "block" && document.querySelector(".text-gray-700").style.display === "block"){
//                 document.getElementById("edit").style.display = "none"
//                 document.querySelector(".grid-form").style.display = "none"
//             }
//         })
//     })
// })

// document.querySelector(".logout")?.addEventListener("click", function () {
//     document.getElementById("logoutModal").classList.toggle("show")

//     if (
//         document.getElementById("logoutModal").classList.contains("show")
//     ) {
//         document.querySelectorAll(".bx.bx-x").forEach(function (element) {
//         element?.addEventListener("click", function () {
//             document
//             .getElementById("logoutModal")
//             .classList.remove("show")
//         })
//         })
//     }
//     document.querySelectorAll(".btn-cancel").forEach(function (element) {
//         element?.addEventListener("click", function () {
//         document.getElementById("logoutModal").classList.remove("show")
//         })
//     })
// })


// document.querySelectorAll('.bx.bx-trash').forEach(update => {
//     update?.addEventListener('click', function () {
//         document.getElementById("deleteModal").classList.toggle("show")

//         if (
//             document.getElementById("deleteModal").classList.contains("show")
//         ) {
//             document.querySelectorAll(".bx.bx-x").forEach(function (element) {
//                 element?.addEventListener("click", function () {
//                     document
//                         .getElementById("deleteModal")
//                         .classList.remove("show")
//                 })
//             })
//         }
//         document.querySelectorAll(".btn-cancel").forEach(function (element) {
//             element?.addEventListener("click", function () {
//                 document.getElementById("deleteModal").classList.remove("show")
//             })
//         })
//     })
// })


// document.querySelector(".block.change_pass")?.addEventListener("click", function () {
//     document.getElementById("authentication-add").classList.toggle("show")

//     if (
//         document.getElementById("authentication-add").classList.contains("show")
//     ) {
//         document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
//         element.addEventListener("click", function () {
//             document.getElementById("authentication-add").classList.remove("show")
//         })
//         })
//     }
//     document.querySelectorAll(".btn-prev")?.forEach(function (element) {
//         element.addEventListener("click", function () {
//         document.getElementById("authentication-add").classList.remove("show")
//         })
//     })
// })

var coll = document.getElementsByClassName("collapsible")
var i

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active")
        var content = this.nextElementSibling
        if (content.style.display === "block") {
            content.style.display = "none"
        } else {
            content.style.display = "block"
        }
    })
}


// test
console.log("test")


document.getElementById('dropdownLeftStartButton')?.addEventListener("click", function () {
    document.getElementById("dropdownLeftStart").classList.toggle("show")

    if (document.getElementById("dropdownLeftStart").classList.contains("show")) {
        document.getElementById("dropdownInformation").classList.remove("show")
    }

})

document.getElementById('dropdownInformationButton')?.addEventListener("click", function () {
    document.getElementById("dropdownInformation").classList.toggle("show")

    if (document.getElementById("dropdownLeftStart").classList.contains("show")) {
        document.getElementById("dropdownLeftStart").classList.remove("show")
    }
})

document.querySelector('.addmodal')?.addEventListener("click", function () {
    document.getElementById("authentication-add").classList.toggle("show")

    if (document.getElementById("authentication-add").classList.contains("show")) {
        document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
            element.addEventListener("click", function () {
                document.getElementById("authentication-add").classList.remove("show")
            })
        })
    }
    document.querySelectorAll(".btn-prev")?.forEach(function (element) {
        element.addEventListener("click", function () {
            document.getElementById("authentication-add").classList.remove("show")
        })
    })
})

document.querySelector(".button-add")?.addEventListener("click", function () {
    document.getElementById("authentication-add").classList.toggle("show")

    if (
        document.getElementById("authentication-add").classList.contains("show")
    ) {
        document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
            element.addEventListener("click", function () {
                document.getElementById("authentication-add").classList.remove("show")
            })
        })
    }
    document.querySelectorAll(".btn-prev")?.forEach(function (element) {
        element.addEventListener("click", function () {
            document.getElementById("authentication-add").classList.remove("show")
        })
    })
})


document.querySelectorAll('.bx.bxs-edit-alt').forEach(update => {
    update.addEventListener('click', function () {
        document.getElementById("authentication-update").classList.toggle("show")

        if (
            document.getElementById("authentication-update").classList.contains("show")
        ) {
            document.querySelectorAll(".bx.bx-x").forEach(function (element) {
                element.addEventListener("click", function () {
                    document
                        .getElementById("authentication-update")
                        .classList.remove("show")
                })
            })
        }
        document.querySelectorAll(".btn-prev").forEach(function (element) {
            element.addEventListener("click", function () {
                document.getElementById("authentication-update").classList.remove("show")
            })
        })
    })
})


document.querySelectorAll(".bx.bxs-edit").forEach(update => {
    update?.addEventListener("click", function () {
        document.getElementById("authentication-update").classList.toggle("show")

        if (
            document.getElementById("authentication-update").classList.contains("show")
        ) {
            document.querySelectorAll(".bx.bx-x").forEach(function (element) {
                element.addEventListener("click", function () {
                    document
                        .getElementById("authentication-update")
                        .classList.remove("show")
                })
            })
        }
        document.querySelectorAll(".btn-prev").forEach(function (element) {
            element.addEventListener("click", function () {
                document.getElementById("authentication-update").classList.remove("show")
            })
        })
    })
})

document.querySelector(".block")?.addEventListener("click", function () {
    document.querySelector(".bg-white").style.display = "none"
    document.querySelector(".text-gray-700").style.display = "none"

    if (document.querySelector(".bg-white").style.display === "none" && document.querySelector(".text-gray-700").style.display === "none") {
        document.getElementById("edit").style.display = "block"
        document.querySelector(".grid-form").style.display = "block"
    }

    document.querySelectorAll(".btn-prev").forEach(function (element) {
        element.addEventListener("click", function () {
            document.querySelector(".bg-white").style.display = "block"
            document.querySelector(".text-gray-700").style.display = "block"

            if (document.querySelector(".bg-white").style.display === "block" && document.querySelector(".text-gray-700").style.display === "block") {
                document.getElementById("edit").style.display = "none"
                document.querySelector(".grid-form").style.display = "none"
            }
        })
    })
})

document.querySelector(".logout")?.addEventListener("click", function () {
    document.getElementById("logoutModal").classList.toggle("show")

    if (
        document.getElementById("logoutModal").classList.contains("show")
    ) {
        document.querySelectorAll(".bx.bx-x").forEach(function (element) {
            element?.addEventListener("click", function () {
                document
                    .getElementById("logoutModal")
                    .classList.remove("show")
            })
        })
    }
    document.querySelectorAll(".btn-cancel").forEach(function (element) {
        element?.addEventListener("click", function () {
            document.getElementById("logoutModal").classList.remove("show")
        })
    })
})


document.querySelectorAll('.bx.bx-trash').forEach(update => {
    update?.addEventListener('click', function () {
        document.getElementById("deleteModal").classList.toggle("show")

        if (
            document.getElementById("deleteModal").classList.contains("show")
        ) {
            document.querySelectorAll(".bx.bx-x").forEach(function (element) {
                element?.addEventListener("click", function () {
                    document
                        .getElementById("deleteModal")
                        .classList.remove("show")
                })
            })
        }
        document.querySelectorAll(".btn-cancel").forEach(function (element) {
            element?.addEventListener("click", function () {
                document.getElementById("deleteModal").classList.remove("show")
            })
        })
    })
})


document.querySelector(".block.change_pass")?.addEventListener("click", function () {
    document.getElementById("authentication-add").classList.toggle("show")

    if (
        document.getElementById("authentication-add").classList.contains("show")
    ) {
        document.querySelectorAll(".bx.bx-x")?.forEach(function (element) {
            element.addEventListener("click", function () {
                document.getElementById("authentication-add").classList.remove("show")
            })
        })
    }
    document.querySelectorAll(".btn-prev")?.forEach(function (element) {
        element.addEventListener("click", function () {
            document.getElementById("authentication-add").classList.remove("show")
        })
    })
})
