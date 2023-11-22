@extends('layout.layout')
@section('main')
    <!-- Modal -->
    <div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="UserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UserModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control mb-2" type="text" placeholder="User Name..." id="userName">
                    <input class="form-control" type="text" placeholder="Email..." id="email">
                    <label for="">Type Role Name</label>
                    <select name="" id="userRole" class="form-control">
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addUserBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>User Roles</h6>
                <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;" id="addRole">Add
                                USer</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1700,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        $(document).ready(function() {
            addUser();
        });
        function addUser(){
          $('#addRole').click(function(e) {
            e.preventDefault();
            $('#UserModal').modal('show');
            $('#addUserBtn').click(function(e) {
                e.preventDefault();
                var name = $('#userName').val().trim();
                var email = $('#email').val().trim();
                var idRole = $('#userRole option:selected').val();
                if (name == '') {
                    Toast.fire({
                        icon: "warning",
                        title: "Thiếu Name"
                    });
                } else if (email = '') {
                    Toast.fire({
                        icon: "warning",
                        title: "Thiếu Email"
                    });
                } else {
                    $.ajax({
                        type: "post",
                        url: "/user",
                        data: {
                            name: name,
                            email: email
                        },
                        dataType: "JSON",
                        success: function(res) {
                            Toast.fire({
                                icon: "success",
                                title: "Đã Thêm Người Mới "
                            }).then(() => {
                                window.location.reload();
                            })
                        }
                    });
                }
            });
        });
        }

        
    </script>
@endsection
