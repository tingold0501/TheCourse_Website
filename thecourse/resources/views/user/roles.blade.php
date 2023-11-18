@extends('layout.layout')
@section('main')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Role Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">

                        <input id="roleName" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Tên Loại Tài Khoản...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitAddRole">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal --}}



    <div class="">
        <div class="card">
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
                                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="dropdown-item border-radius-md" href="javascript:;" id="addRole">Add
                                        Role</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên
                                    Loại</th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ngày Tạo</th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Trạng Thái</th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ ++$key }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="  text-sm">
                                        <span class="text-xs font-weight-bold">{{ $item->created_at }}</span>
                                    </td>
                                    <td class="">
                                        @if ($item->status == 1)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" checked>
                                            <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault" >
                                          </div>
                                          @else
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="0" id="flexCheckDefault" >
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" checked>
                                        </div>
                                        @endif
                                       
                                    </td>
                                    <td class="  text-sm">
                                        <button type="button" class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
            addRole();
        });

        function addRole() {
            $('#submitAddRole').click(function(e) {
                e.preventDefault();
                var roleName = $('#roleName').val().trim();
                if (roleName == '') {
                    Toast.fire({
                        icon: "warning",
                        title: "Đã có tên Role đâu mà lưu! Ngáo à"
                    });
                } else {
                    $.ajax({
                        type: "post",
                        url: "/userrole",
                        data: {
                            roleName: roleName
                        },
                        dataType: "JSON",
                        success: function(res) {
                            if (res.check == true) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Gữi yêu cầu thành công!"
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
