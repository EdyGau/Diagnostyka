<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\FormSubmissionException;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use OpenApi\Annotations as OA;

class ApiContactFormController
{
    /**
     * Submit a new contact form entry.
     *
     * @OA\Post(
     *     path="/api/contact",
     *     summary="Submit the contact form",
     *     tags={"Contact Form"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="johndoe@example.com"),
     *             @OA\Property(property="description", type="string", example="This is a test message.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Form submitted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Form submitted successfully!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Validation error."),
     *             @OA\Property(property="errors", type="object", example={"email": ["The email field is required."]})
     *         )
     *     )
     * )
     */
    public function submit(ContactFormRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();

            Log::info('Validated contact form data:', $validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Form submitted successfully!',
                'data' => $validatedData,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors' => $e->errors(),
            ], 422);
        } catch (FormSubmissionException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred.',
            ], 500);
        }
    }

    /**
     * A method to handle retrieving all submitted contact forms.
     *
     * @OA\Get(
     *     path="/api/contact",
     *     summary="Get all submitted contact forms",
     *     tags={"Contact Form"},
     *     @OA\Response(
     *         response=200,
     *         description="List of submitted contact forms",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="johndoe@example.com"),
     *                 @OA\Property(property="description", type="string", example="This is a test message.")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="An unexpected error occurred.")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        try {
            $contactForms = $this->getAllContactForms();

            return response()->json([
                'success' => true,
                'message' => 'Contact forms retrieved successfully.',
                'data' => $contactForms,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred.',
            ], 500);
        }
    }

    /**
     * Method to delete a contact form.
     *
     * @OA\Delete(
     *     path="/api/contact/{id}",
     *     summary="Delete a submitted contact form",
     *     tags={"Contact Form"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Form deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Form deleted successfully!")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Form not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Form not found.")
     *         )
     *     )
     * )
     */
    public function delete(int $id): JsonResponse
    {
        try {
            $contactForms = $this->getAllContactForms();

            if (!isset($contactForms[$id])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Form not found.',
                ], 404);
            }

            unset($contactForms[$id]);

            return response()->json([
                'success' => true,
                'message' => 'Form deleted successfully!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred.',
            ], 500);
        }
    }

    /**
     * Get all contact forms.
     *
     * @return array
     */
    private function getAllContactForms(): array
    {
        return [
            1 => ['name' => 'John Doe', 'email' => 'johndoe@example.com', 'description' => 'This is a test message.'],
            2 => ['name' => 'Jane Doe', 'email' => 'janedoe@example.com', 'description' => 'Another test message.'],
        ];
    }
}
