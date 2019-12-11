<section class="_home-module bg-grey">
    <div class="container pt-20">
        <h2 class="mt-20 mb-20">Nous Contacter</h2>

        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <form class="_form" action="{{ route('contact.store')}}">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="name" aria-describedby="emailHelp" placeholder="Taper votre nom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="Taper votre email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="sujet" aria-describedby="emailHelp" placeholder="Taper votre sujet" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-lg" id="message" placeholder="Taper votre message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <p>Yaoundé, Cameroun</p>
                        {{-- <p>BP: </p> --}}
                        <p>Email : locklucpergaud@yahoo.fr</p>
                        <p>Tel. +237 699 90 31 33</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
