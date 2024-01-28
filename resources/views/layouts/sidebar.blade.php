<!-- Sidebar-right-->
		<div class="sidebar sidebar-left sidebar-animate">
			<div class="panel panel-primary card mb-0 box-shadow">
				<div class="tab-menu-heading border-0 p-3">
					<div class="card-title mb-0">مستخدمون النظام</div>
					<div class="card-options mr-auto">
						<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
				<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs">

							<li><a href="#side3" data-toggle="tab"><i class="ion ion-md-contacts tx-18 ml-2"></i> المستخدمون</a></li>
						</ul>
					</div>
					<div class="tab-content">

						<div class="tab-pane  active " id="side3">
							<div class="list-group list-group-flush ">







                                @foreach($users1 as $users1)

								<div class="list-group-item d-flex  align-items-center">
									<div class="ml-2">
										<span class="avatar avatar-md brround cover-image" data-image-src="{{URL::asset('assets/img/1.jpg')}}"></span>
									</div>
									<div class="">
                                        @if(Cache::has('user-is-online-' . $users1->id))
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-2"></div>
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-2"></div>
                                            </span>
                                        @endif
										<div class="font-weight-semibold" data-toggle="modal" data-target="#chatmodel">{{ $users1->name }}</div>
                                            {{ Carbon\Carbon::parse($users1->last_seen)->diffForHumans() }}
									</div>

									<div class="mr-auto">
										<a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel1" ><i class="fab fa-facebook-messenger"></i></a>
									</div>
								</div>
							</div>
                            @endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
<!--/Sidebar-right-->
