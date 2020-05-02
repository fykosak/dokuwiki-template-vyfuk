<?php

namespace fksTemplate\NavBar;

class NavBarItem {
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $icon;
    /**
     * @var integer
     */
    private $level;
    /**
     * @var string
     */
    private $content;
    /**
     * @var boolean
     */
    private $important;

    public function __construct(array $parameters) {
        $this->id = $parameters['id'];
        $this->icon = $parameters['icon'];
        $this->level = $parameters['level'];
        $this->content = $parameters['content'];
        $this->important = $parameters['important'];
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIcon(): string {
        if ($this->icon) {
            return ' <span class="' . $this->icon . '" ></span > ';
        }
        return '';
    }

    /**
     * @return bool
     */
    private function isExternal(): bool {
        return preg_match('#https?://#', $this->id);
    }

    /**
     * @return integer
     */
    public function getLevel(): int {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getLink(): string {
        if ($this->isExternal()) {
            return htmlspecialchars($this->id);
        }
        return wl(cleanID($this->id));
    }

    /**
     * @return bool
     */
    public function isImportant(): bool {
        return (bool)$this->important;
    }

    /**
     * @return bool
     */
    public function hasId(): bool {
        return !is_null($this->id);
    }
}
