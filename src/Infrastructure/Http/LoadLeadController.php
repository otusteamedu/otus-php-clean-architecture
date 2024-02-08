<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\UseCase\LoadLeadUseCase;
use App\Application\UseCase\Request\LoadLeadRequest;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class LoadLeadController extends AbstractFOSRestController
{
    public function __construct(
        private LoadLeadUseCase $useCase
    )
    {
    }

    /**
     * @Rest\Get("/api/v1/leads/{id}")
     * @return Response
     */
    public function __invoke(int $id): Response
    {
        try {
            $request = new LoadLeadRequest($id);
            $response = ($this->useCase)($request);
            $view = $this->view($response, 200);
        } catch (\Throwable $e) {
            // todo В реальности используются более сложные обработчики ошибок
            $errorResponse = [
                'message' => $e->getMessage()
            ];
            $view = $this->view($errorResponse, 400);
        }
        return $this->handleView($view);
    }
}