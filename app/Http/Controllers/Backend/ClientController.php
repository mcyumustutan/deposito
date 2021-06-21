<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Backend/Client/Index', [
            'data' => json_encode([
                'data' => Client::all()
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Backend/Client/Create', [
            'data' => json_encode([])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        $attr = $request->validated();

        $client = Client::create([
            'fullname' => $attr['name'] . " " . $attr['surname'],
            'name' => $attr['name'],
            'surname' => $attr['surname'],
            'email' => $attr['email'],
            'phone' => $attr['phone'],
            'amount' => $attr['amount'],
            'total' => $attr['total'],
            'currency' => $attr['currency'],
            'city' => $attr['city'],
            'country' => $attr['country'],
            'address' => $attr['address'],
            'note' => "asd",
        ]);


        return Redirect::route('client.show', ['client' => $client->id])->with('success', 'Yeni müşteri ekledi: ' . $attr['name'] . " " . $attr['surname']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return Inertia::render('Backend/Client/Show', [
            'client' =>  $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientStoreRequest $request, Client $Client)
    {
        $attr = $request->validated();
        $attr["status"] = $request->status;
        $Client->update($attr);
        return redirect()->back()
            ->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function order(Request $r, $id)
    {

        $Client = Client::find($id)->only(["id", "fullname", "name", "surname", "email", "phone", "city", "country", "address", "currency", "amount", "note", "created_at", "status"]);

        if ($Client["status"] == "waiting") {
            $options = new \Iyzipay\Options();
            $options->setApiKey("sandbox-LnSeZWIkNClnDNFnwrCwmSkRKoglwQ1i");
            $options->setSecretKey("sandbox-6BixudNvUcIFfJjJkLUcIVLxfALBx8tC");
            $options->setBaseUrl("https://sandbox-api.iyzipay.com");
            # create request class
            $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
            $request->setLocale(\Iyzipay\Model\Locale::EN);

            $request->setConversationId($Client['fullname']);

            $request->setPrice($Client['amount']);
            $request->setPaidPrice($Client['amount']);
            $mc = strtoupper($Client["currency"]);
            $mc = constant("\Iyzipay\Model\Currency::$mc");
            $request->setCurrency($mc);
            $request->setBasketId($Client['id']);
            $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
            $request->setCallbackUrl(env('IYZICO_PAYMENT_CALLBACK'));
            $request->setEnabledInstallments(array(1));

            $buyer = new \Iyzipay\Model\Buyer();
            $buyer->setId($Client['id']);
            $buyer->setName($Client['name']);
            $buyer->setSurname($Client['surname']);
            $buyer->setGsmNumber($Client['phone']);
            $buyer->setEmail($Client["email"]);
            $buyer->setIdentityNumber("74300864791");

            $buyer->setRegistrationAddress($Client["address"]);
            $buyer->setIp($r->ip());
            $buyer->setCity($Client["city"]);
            $buyer->setCountry($Client["country"]);
            $request->setBuyer($buyer);

            $shippingAddress = new \Iyzipay\Model\Address();
            $shippingAddress->setContactName($Client["name"] . ' ' . $Client["surname"]);
            $shippingAddress->setCity($Client["city"]);
            $shippingAddress->setCountry($Client["country"]);
            $shippingAddress->setAddress($Client["address"]);
            $shippingAddress->setZipCode("34742");
            $request->setShippingAddress($shippingAddress);

            $billingAddress = new \Iyzipay\Model\Address();
            $billingAddress->setContactName("Jane Doe");
            $billingAddress->setCity($Client["city"]);
            $billingAddress->setCountry($Client["country"]);
            $billingAddress->setAddress($Client["address"]);
            $request->setBillingAddress($billingAddress);

            $basketItems = array();
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId($Client["id"]);
            $firstBasketItem->setName("Tour");
            $firstBasketItem->setCategory1("Tour");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            $firstBasketItem->setPrice($Client["amount"]);
            $basketItems[0] = $firstBasketItem;


            $request->setBasketItems($basketItems);

            # make request
            $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
            $myform = $checkoutFormInitialize->getCheckoutFormContent();
        } else {
            $myform = "Your depostit already payed";
        }

        // return Inertia::render('Frontend/Client/Order', [
        //     'client' =>  $Client,
        //     'form' => $checkoutFormInitialize->getCheckoutFormContent()
        // ]);
        return view('Frontend/Client/Order', [
            'client' =>  $Client,
            'form' => $myform
        ]);
    }

    public function iyzicocallback(Request $r)
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-LnSeZWIkNClnDNFnwrCwmSkRKoglwQ1i");
        $options->setSecretKey("sandbox-6BixudNvUcIFfJjJkLUcIVLxfALBx8tC");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setToken($r->get('token'));

        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);

        if ($checkoutForm->getFraudStatus() === 1 && $checkoutForm->getPaymentStatus() === "SUCCESS") {
            $Client = Client::find($checkoutForm->getBasketId());
            $Client->status = 'success';
            $Client->save();
            return redirect()->route('order', ['id' => $checkoutForm->getBasketId()])->with('success', 'Deposit successful!');
        } else {
            return redirect()->route('order', ['id' => $checkoutForm->getBasketId()])->with('error', 'Somethings wrent wrong! Plese, contact seller.');
        }
    }
}
