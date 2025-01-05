<?php

namespace Shezo\AnimalLovers\Api\Data;

interface CustomerPetPreferenceInterface
{
    const CUSTOMER_ID = 'customer_id';
    const IS_DOG_LOVER = 'is_dog_lover';
    const IS_CAT_LOVER = 'is_cat_lover';

    /**
     * Get customer ID
     *
     * @return int
     */
    public function getCustomerId();

    /**
     * Set customer ID
     *
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * Get is dog lover
     *
     * @return bool
     */
    public function getIsDogLover();

    /**
     * Set is dog lover
     *
     * @param bool $isDogLover
     * @return $this
     */
    public function setIsDogLover($isDogLover);

    /**
     * Get is cat lover
     *
     * @return bool
     */
    public function getIsCatLover();

    /**
     * Set is cat lover
     *
     * @param bool $isCatLover
     * @return $this
     */
    public function setIsCatLover($isCatLover);
}
