<?php


namespace backend\subscribers;


use backend\events\TaskSaveEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SaveTaskSubscriber implements EventSubscriberInterface
{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            TaskSaveEvent::class=>[['logIt']]
        ];
    }

    public function logIt(TaskSaveEvent $event){
        \Yii::warning('event DISPATCHER '.$event->getTask()->getTitle());
    }
}