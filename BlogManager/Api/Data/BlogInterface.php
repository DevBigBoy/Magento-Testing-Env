<?php

namespace Shezo\BlogManager\Api\Data;

interface BlogInterface
{
    /** Table column names */
    const ENTITY_ID = 'entity_id';
    const USER_ID = 'user_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const IMAGE_PATH = 'image_path';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get blog ID.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set blog ID.
     *
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Get user ID.
     *
     * @return int
     */
    public function getUserId();

    /**
     * Set user ID.
     *
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId);

    /**
     * Get blog title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set blog title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get blog content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set blog content.
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get image path.
     *
     * @return string|null
     */
    public function getImagePath();

    /**
     * Set image path.
     *
     * @param string|null $imagePath
     * @return $this
     */
    public function setImagePath($imagePath);

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set status.
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get creation timestamp.
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Get updated timestamp.
     *
     * @return string
     */
    public function getUpdatedAt();
}
