<?php include_once __DIR__ . '/partialsAdmin/navBarRdv.php'; ?>
<link rel="stylesheet" href="../style/newAppointment.css">
<?php include_once __DIR__ . '/partialsAdmin/navBarRdv.php'; ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form method="post">
    <div class="banner3">
        <div class="py-5 banner" style="background-image:url(https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/form-banners/banner2/banner-bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-5">
                        <h3 class="my-3 text-white font-weight-medium text-uppercase">Prendre Rendez-vous en ligne</h3>
                        <div class="bg-white">
                            <div class="form-row border-bottom">
                                <div class="p-4 left border-right w-50">
                                    <label for="nom" class="text-inverse font-12 text-uppercase">Nom</label>
                                    <input name="nom" id="nom" type="text" class="border-0 p-0 font-14 form-control" placeholder="Votre Nom" required />
                                </div>
                                <div class="p-4 right w-50">
                                    <label for="prenom" class="text-inverse font-12 text-uppercase">Prénom</label>
                                    <input name="prenom" id="prenom" type="text" class="border-0 p-0 font-14 form-control" placeholder="Votre prénom" required />
                                </div>
                            </div>
                            <div class="form-row border-bottom p-4">
                                <label for="email" class="text-inverse font-12 text-uppercase">Adresse email</label>
                                <input name="email" id="email" type="text" class="border-0 p-0 font-14 form-control" placeholder="Renseignez votre adresse email" />
                            </div>
                            <div class="form-row border-bottom p-4">
                                <label for="tel" class="text-inverse font-12 text-uppercase">Numéro de téléphone</label>
                                <input name="tel" id="tel" type="text" class="border-0 p-0 font-14 form-control" placeholder="Renseignez votre numéro de téléphone" required />
                            </div>
                            <div class="form-row border-bottom p-4 position-relative">
                                <label for="dp" class="text-inverse font-12 text-uppercase">Date de rendez-vous</label>
                                <div class="input-group date">
                                    <input name="date" type="date" class="border-0 p-0 font-14 form-control" id="dp" placeholder="Choisissez la date de rendez-vous" required />

                                </div>
                            </div>
                            <div class="form-row border-bottom p-4 position-relative">
                                <label for="dp" class="text-inverse font-12 text-uppercase">Heure de rendez-vous</label>
                                <div class="input-group date">
                                    <input name="time" type="time" class="border-0 p-0 font-14 form-control" placeholder="Choisissez la date de rendez-vous" required />

                                </div>
                            </div>
                            <div class="form-row border-bottom p-4">
                                <label for="text" class="text-inverse font-12 text-uppercase">Message</label>
                                <textarea name="message" id="text" col="1" row="1" class="border-0 p-0 font-weight-light font-14 form-control" placeholder="Si une information vous parait importante, merci de la renseigner ici"></textarea>
                            </div>
                            <div>
                                <button id="submit" type="submit" class="m-0 border-0 py-4 font-14 font-weight-medium btn btn-danger-gradiant btn-block position-relative rounded-0 text-center text-white text-uppercase">
                                    <span>Réservez maintenant</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>