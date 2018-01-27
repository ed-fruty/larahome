<?php

namespace App;

use App\Components\Database\Schema\NodeScheme;
use App\Components\Database\Traits\HasUuid;
use App\ValueObjects\NodeConnection;
use App\ValueObjects\NodeDsn;
use App\ValueObjects\NodePlatform;
use App\ValueObjects\NodeProtocol;
use App\ValueObjects\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Node extends Model
{
    use HasUuid;

    /**
     * Disable autoincrement.
     * 
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Set primary key value type.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Set node id.
     * 
     * @param string $id 
     * @return Node 
     */
    public function setId(string $id): Node
    {
        $this->setAttribute($this->getKeyName(), $id);

        return $this;
    }

    /**
     * Set node connection.
     * 
     * @param NodeConnection $connection
     * @return Node 
     */
    public function setConnection(NodeConnection $connection): Node
    {
        $this->setAttribute(NodeScheme::ATTR_CONNECTION, $connection->getValue());

        return $this;
    }

    /**
     * Get node connection.
     * 
     * @return NodeConnection 
     */
    public function getConnection(): NodeConnection
    {
        return new NodeConnection(
            $this->getAttribute(NodeScheme::ATTR_CONNECTION)
        );
    }

    /**
     * Set node platform.
     *     
     * @param NodePlatform $platform
     * @return Node 
     */
    public function setPlatform(NodePlatform $platform): Node
    {
        $this->setAttribute(NodeScheme::ATTR_PLATFORM, $platform->getValue());

        return $this;
    }

    /**
     * Get node platform.
     * 
     * @return NodePlatform 
     */
    public function getPlatform(): NodePlatform
    {
        return new NodePlatform(
            $this->getAttribute(NodeScheme::ATTR_PLATFORM)
        );
    }

    /**
     * Set node protocol.
     *     
     * @param NodeProtocol $protocol
     * @return Node 
     */
    public function setProtocol(NodeProtocol $protocol): Node
    {
        $this->setAttribute(NodeScheme::ATTR_PROTOCOL, $protocol->getValue());

        return $this;
    }

    /**
     * Get node protocol.
     * 
     * @return NodeProtocol 
     */
    public function getProtocol(): NodeProtocol
    {
        return new NodeProtocol(
            $this->getAttribute(NodeScheme::ATTR_PROTOCOL)
        );
    }

    /**
     * Set node status.
     * 
     * @param Status $status 
     * @return Node 
     */
    public function setStatus(Status $status): Node
    {
        $this->setAttribute(NodeScheme::ATTR_STATUS, $status->getStatusValue());

        return $this;
    }

    /**
     * Get node status.
     * 
     * @return Status 
     */
    public function getStatus(): Status
    {
        return new Status(
            $this->getAttribute(NodeScheme::ATTR_STATUS)
        );
    }

    /**
     * Set node name.
     * 
     * @param string $name
     * @return Node  
     */
    public function setName(string $name): Node
    {
        $this->setAttribute(NodeScheme::ATTR_NAME, $name);

        return $this;
    }

    /**
     * Get node name.
     * 
     * @return string 
     */
    public function getName(): string
    {
        return (string) $this->getAttribute(NodeScheme::ATTR_NAME);
    }

    /**
     * Set node dsn params.
     * 
     * @param NodeDsn $dsn 
     */
    public function setDsn(NodeDsn $dsn): Node
    {
        $this->setAttribute(NodeScheme::ATTR_DSN, $dsn->getValue());

        return $this;
    }

    /**
     * Get node dsn.
     * 
     * @return NodeDsn 
     */
    public function getDsn(): NodeDsn
    {
        return new NodeDsn(
            $this->getAttribute(NodeScheme::ATTR_DSN)
        );
    }

    /**
     * Set node keyword.
     * 
     * @param string $keyword 
     * @return Node [<description>]
     */
    public function setKeyword(string $keyword): Node
    {
        $this->setAttribute(NodeScheme::ATTR_KEYWORD, $keyword);

        return $this;
    }

    /**
     * Get node keyword
     * @return string 
     */
    public function getKeyword(): string
    {
        return (string) $this->getAttribute(NodeScheme::ATTR_KEYWORD);
    }

    /**
     * Set node last pinged time.
     * 
     * @param Carbon $pingedAt 
     * @return Node
     */
    public function setPingedAt(Carbon $pingedAt): Node
    {
        $this->setAttribute(NodeScheme::ATTR_PINGED_AT, $pingedAt->format('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Get node last pinged time.
     * 
     * @return Carbon 
     */
    public function getPingedAt()
    {
        return new Carbon(
            $this->getAttribute(NodeScheme::ATTR_PINGED_AT)
        );
    }

    /**
     * Get created time.
     * 
     * @return Carbon 
     */
    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute($this->getCreatedAtColumn());
    }

    /**
     * Get updated time.
     * 
     * @return Carbon 
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute($this->getUpdatedAtColumn());
    }

    /**
     * Node sensors relation.
     * 
     * @return HasMany 
     */
    public function sensors(): HasMany
    {
        return $this->hasMany(Sensor::class);
    }

    /**
     * Get all node related sensors.
     * 
     * @return Collection 
     */
    public function getSensors(): Collection
    {
        //return $this->sensors()->get();
        //
        return $this->getAttribute(NodeScheme::RELATION_SENSORS);
    }
}
