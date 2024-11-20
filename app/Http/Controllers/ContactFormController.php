<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use App\Services\ContactFormService;
use App\Helpers\ContactFormHelper;

class ContactFormController extends Controller
{
    protected ContactFormHelper $contactFormHelper;
    protected ContactFormService $contactFormService;

    public function __construct(ContactFormHelper $contactFormHelper, ContactFormService $contactFormService)
    {
        $this->contactFormHelper = $contactFormHelper;
        $this->contactFormService = $contactFormService;
    }

    /**
     * Show the contact form.
     *
     * @return View
     */
    public function showForm(): View
    {
        $builder = $this->contactFormHelper->createContactFormBuilder();

        return view('forms.contact_form', [
            'form' => $builder,
            'formAction' => route('contact.submit'),
        ]);
    }

    /**
     * Handle the form submission after validation.
     *
     * @param ContactFormRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactFormRequest $request): RedirectResponse
    {
        try {
            $validatedData = $request->validated();

//            $this->contactFormService->processFormSubmission($validatedData);

            return redirect()->back()->with('success', 'Formularz został wysłany pomyślnie!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Wystąpił błąd podczas przetwarzania formularza. Spróbuj ponownie później.']);
        }
    }
}
