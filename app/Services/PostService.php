<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    /**
     * @var $postRepository
     */
    protected $postRepository;

    /**
     * PostService constructor
     * 
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Validate post data.
     * Store to DB if there are no errors.
     * 
     * @param array $data
     * @return string
     */
    public function savePostData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->postRepository->save($data);

        return $result;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function updatePost($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'description' =>'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try{
            $post = $this->postRepository->update($data, $id);
        }catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update post data');
        }

        DB::commit();

        return $post;
    }

    /**
     * Delete post by id.
     * 
     * @param $id
     * @return string
     */
    public function deleteById($id) 
    {
        DB::beginTransaction();

        try {
            $post = $this->postRepository->delete($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unableto delete post data');
        }

        DB::commit();

        return $post;
    }
} 