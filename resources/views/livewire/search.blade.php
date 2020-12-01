@section('title')
    Pencarian
@endsection
@section('css')
    <style>
        .modal.left .modal-dialog,
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 320px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
                -ms-transform: translate3d(0%, 0, 0);
                -o-transform: translate3d(0%, 0, 0);
                    transform: translate3d(0%, 0, 0);
        }

        .modal.left .modal-content,
        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }
        
        .modal.left .modal-body,
        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }
        .modal.right.fade .modal-dialog {
            right: 0;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
                -o-transition: opacity 0.3s linear, right 0.3s ease-out;
                    transition: opacity 0.3s linear, right 0.3s ease-out;
        }
        
        .modal.right.fade.in .modal-dialog {
            right: 0;
        }

    /* ----- MODAL STYLE ----- */
        .modal-content {
            border-radius: 0;
            border: none;
        }

        .modal-header {
            border-bottom-color: #EEEEEE;
            background-color: #FAFAFA;
        }
    </style>
@endsection
<div>
    <div class="row mt-5">
        <div class="col-10">
            <div class="section-title">
                <h4>Cari ""</h4>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalFilter"><i class="fa fa-filter"></i> FILTER</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('public/assets/images/buku/123.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h5>Remember Us</h5>
                    <span style="font-size: 11pt; font-weight: lighter;">Disewakan</span>
                    <h5>Rp30.000</h5>
                    <p class="card-text text-right" style="font-size: 10pt;"><i class="fa fa-map-marker-alt"></i> Kab. Sidoarjo</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal right fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">Filter</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</p>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
</div>