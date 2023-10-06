<?php

class StringUtils
{
    public function __construct()
    {
        return;
    }

    // $icon = error, warning, info, success
    public function setMessage($icon, $message)
    {
        echo '
        <script>
            $(document).ready(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showCloseButton: true,
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true
                });

                Toast.fire({
                    icon: "' . $icon . '",
                    title: "' . $message . '"
                });

            });
        </script>
        ';
    }

    public function getProjectStatus($id)
    {
        return ($id == 1 ? "Pending" : ($id == 2 ? "Ongoing" : ($id == 3 ? "Completed" : ($id == 4 ? "Close" : ""))));
    }

    public function getUserType($id)
    {
        return ($id == 0 ? "Root" : ($id == 1 ? "Administrator" : ($id == 2 ? "Leader" : ($id == 3 ? "Member" : ""))));
    }

    public function getHonorifics($id)
    {
        return ($id == 0 ? "Mr." : ($id == 1 ? "Ms." : ($id == 2 ? "Mrs." : "")));
    }

    public function getGender($id)
    {
        return ($id == 0 ? "Female" : ($id == 1 ? "Male" : "No Gender"));
    }
}
