<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 01/11/2017
 * Time: 12:10
 */

namespace App\Services;


use App\Contracts\Repositories\CandidateRepository;
use App\Repositories\ImageRepository;

class CandidateService
{
    /**
     * @var CandidateRepository
     */
    private $repository;
    /**
     * @var ImageRepository
     */
    private $imageRepository;

    public function __construct(CandidateRepository $repository, ImageRepository $imageRepository)
    {

        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
    }

    public function updateProfile(array $data, $id)
    {
        $file = $data['cover'] ?? null;
        unset($data['cover']);
        $candidate = $this->repository->update($data, $id);
        if ($file) {
            $image = $this->imageRepository->saveImage($file, $id, 'candidate', 600);
            $candidate->cover = $image;
            $candidate->save();
        }
    }
}