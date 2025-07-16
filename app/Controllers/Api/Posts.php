<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Posts extends BaseController
{
    /**
     * GET /api/posts
     * List all posts
     */
    public function getIndex()
    {
        // Mock data - replace with actual database queries
        $posts = [
            [
                'id' => 1,
                'title' => 'Getting Started with CodeIgniter 4',
                'content' => 'CodeIgniter 4 is a powerful PHP framework...',
                'author_id' => 1,
                'created_at' => '2024-01-15 10:30:00'
            ],
            [
                'id' => 2,
                'title' => 'Vue.js and CodeIgniter Integration',
                'content' => 'Learn how to integrate Vue.js with CodeIgniter...',
                'author_id' => 2,
                'created_at' => '2024-01-16 14:45:00'
            ],
            [
                'id' => 3,
                'title' => 'Auto Routing in CodeIgniter 4',
                'content' => 'Auto routing makes API development much easier...',
                'author_id' => 1,
                'created_at' => '2024-01-17 09:15:00'
            ]
        ];

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $posts,
            'total' => count($posts)
        ]);
    }

    /**
     * GET /api/posts/123
     * Show a specific post
     */
    public function getShow($id)
    {
        // Mock data - replace with actual database query
        $post = [
            'id' => $id,
            'title' => 'Getting Started with CodeIgniter 4',
            'content' => 'CodeIgniter 4 is a powerful PHP framework that makes building web applications easy and fun. It provides excellent features like auto routing, which we are demonstrating here.',
            'author_id' => 1,
            'author_name' => 'John Doe',
            'tags' => ['php', 'codeigniter', 'framework'],
            'created_at' => '2024-01-15 10:30:00',
            'updated_at' => '2024-01-15 10:30:00'
        ];

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $post
        ]);
    }

    /**
     * POST /api/posts
     * Create a new post
     */
    public function postCreate()
    {
        $input = $this->request->getJSON(true);

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required|min_length[10]',
            'author_id' => 'required|integer'
        ]);

        if (!$validation->run($input)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validation->getErrors()
                ]);
        }

        // Mock creation - replace with actual database insert
        $newPost = [
            'id' => rand(100, 999),
            'title' => $input['title'],
            'content' => $input['content'],
            'author_id' => $input['author_id'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->response
            ->setStatusCode(201)
            ->setJSON([
                'status' => 'success',
                'message' => 'Post created successfully',
                'data' => $newPost
            ]);
    }

    /**
     * PUT /api/posts/123
     * Update an existing post
     */
    public function putUpdate($id)
    {
        $input = $this->request->getJSON(true);

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required|min_length[10]'
        ]);

        if (!$validation->run($input)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validation->getErrors()
                ]);
        }

        // Mock update - replace with actual database update
        $updatedPost = [
            'id' => $id,
            'title' => $input['title'],
            'content' => $input['content'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'data' => $updatedPost
        ]);
    }

    /**
     * DELETE /api/posts/123
     * Delete a post
     */
    public function deleteDelete($id)
    {
        // Mock deletion - replace with actual database delete
        // You might want to add authorization checks here

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Post deleted successfully',
            'deleted_id' => $id
        ]);
    }

    /**
     * GET /api/posts/search?q=keyword
     * Search posts (custom method)
     */
    public function getSearch()
    {
        $query = $this->request->getGet('q');

        if (empty($query)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Search query is required'
                ]);
        }

        // Mock search results
        $results = [
            [
                'id' => 1,
                'title' => 'Getting Started with CodeIgniter 4',
                'excerpt' => 'CodeIgniter 4 is a powerful PHP framework...',
                'relevance' => 0.95
            ]
        ];

        return $this->response->setJSON([
            'status' => 'success',
            'query' => $query,
            'results' => $results,
            'total' => count($results)
        ]);
    }
}
