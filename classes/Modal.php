<?php
/* CREATE MODAL WINDOWS
* $title - window title
* $message - window message
* $type - window type
* $objectId - id of the requested object
* $link - redirect link
*/
class Modal
{

    private $title;
    private $message;
    private $type;
    private $objectId;
    private $link;

    public function __construct($title, $message, $type, $objectId, $link)
    {
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
        $this->objectId = $objectId;
        $this->link = $link;

        if ($this->type = 'Confirm') {

            echo '
    <div class="modal fade" id="' . $objectId . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">' . $title . '</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="mb-5">' . $message . '</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="' . $link . '">
                                                                        <button type="button" class="btn btn-primary">Да</button>
                                                                    </a>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
        }
    }
}
