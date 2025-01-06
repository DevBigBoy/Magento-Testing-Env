<?php

namespace Shezo\BlogManager\Api\Data;

interface CommentInterface
{
    /** Table column names */
    const ENTITY_ID = 'entity_id';
    const BLOG_ID = 'blog_id';
    const USER_ID = 'user_id';
    const SCREEN_NAME = 'screen_name';
    const COMMENT = 'comment';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

    /**
     * Get comment ID.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set comment ID.
     *
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Get blog ID.
     *
     * @return int
     */
    public function getBlogId();

    /**
     * Set blog ID.
     *
     * @param int $blogId
     * @return $this
     */
    public function setBlogId($blogId);

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
     * Get screen name.
     *
     * @return string
     */
    public function getScreenName();

    /**
     * Set screen name.
     *
     * @param string $screenName
     * @return $this
     */
    public function setScreenName($screenName);

    /**
     * Get comment text.
     *
     * @return string
     */
    public function getComment();

    /**
     * Set comment text.
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment);

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
}
