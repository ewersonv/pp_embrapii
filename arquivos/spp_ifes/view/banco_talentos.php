<?php
    include_once("header.html");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body id="grad1">
    <div class="container py-5 center">
        <div class="row">
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3 text-center">Banco de talentos</h4>
            <form class="needs-validation" novalidate>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome completo" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="data">Data de nascimento</label>
                    <input type="date" class="form-control" id="data" value="" required>
                    <div class="invalid-feedback">
                    Data de nascimento inválida.
                    </div>
                </div>
                </div>

                <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Email inválido.
                </div>
                </div>

                <div class="mb-3">
                <label for="teste1">teste1</label>
                <input type="text" class="form-control" id="teste1" placeholder="" required>
                </div>

                <div class="mb-3">
                <label for="teste2">teste2</label>
                <input type="text" class="form-control" id="teste2" placeholder="">
                </div>

                <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="estado">Estado</label>
                    <select class="custom-select d-block w-100" id="estado" required>
                    <option value="">Escolha...</option>
                    <option>ES</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cidade">Cidade</label>
                    <select class="custom-select d-block w-100" id="cidade" required>
                    <option value="">Escolha...</option>
                    <option>Vila Velha</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder="" required>
                    <div class="invalid-feedback">
                    Zip code required.
                    </div>
                </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="save-info">
                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                    Name on card is required
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                    <div class="invalid-feedback">
                    Credit card number is required
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                    <div class="invalid-feedback">
                    Expiration date required
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                    <div class="invalid-feedback">
                    Security code required
                    </div>
                </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-dark btn-lg btn-block" type="submit">Cadastrar</button>
            </form>
            </div>
        </div>

	</body>
</html>