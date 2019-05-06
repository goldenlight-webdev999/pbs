<?php
// This file was auto-generated from sdk-root/src/data/mediastore-data/2017-09-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-09-01', 'endpointPrefix' => 'data.mediastore', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'MediaStore Data', 'serviceFullName' => 'AWS Elemental MediaStore Data Plane', 'serviceId' => 'MediaStore Data', 'signatureVersion' => 'v4', 'signingName' => 'mediastore', 'uid' => 'mediastore-data-2017-09-01', ], 'operations' => [ 'DeleteObject' => [ 'name' => 'DeleteObject', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/{Path+}', ], 'input' => [ 'shape' => 'DeleteObjectRequest', ], 'output' => [ 'shape' => 'DeleteObjectResponse', ], 'errors' => [ [ 'shape' => 'ContainerNotFoundException', ], [ 'shape' => 'ObjectNotFoundException', ], [ 'shape' => 'InternalServerError', ], ], ], 'DescribeObject' => [ 'name' => 'DescribeObject', 'http' => [ 'method' => 'HEAD', 'requestUri' => '/{Path+}', ], 'input' => [ 'shape' => 'DescribeObjectRequest', ], 'output' => [ 'shape' => 'DescribeObjectResponse', ], 'errors' => [ [ 'shape' => 'ContainerNotFoundException', ], [ 'shape' => 'ObjectNotFoundException', ], [ 'shape' => 'InternalServerError', ], ], ], 'GetObject' => [ 'name' => 'GetObject', 'http' => [ 'method' => 'GET', 'requestUri' => '/{Path+}', ], 'input' => [ 'shape' => 'GetObjectRequest', ], 'output' => [ 'shape' => 'GetObjectResponse', ], 'errors' => [ [ 'shape' => 'ContainerNotFoundException', ], [ 'shape' => 'ObjectNotFoundException', ], [ 'shape' => 'RequestedRangeNotSatisfiableException', ], [ 'shape' => 'InternalServerError', ], ], ], 'ListItems' => [ 'name' => 'ListItems', 'http' => [ 'method' => 'GET', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListItemsRequest', ], 'output' => [ 'shape' => 'ListItemsResponse', ], 'errors' => [ [ 'shape' => 'ContainerNotFoundException', ], [ 'shape' => 'InternalServerError', ], ], ], 'PutObject' => [ 'name' => 'PutObject', 'http' => [ 'method' => 'PUT', 'requestUri' => '/{Path+}', ], 'input' => [ 'shape' => 'PutObjectRequest', ], 'output' => [ 'shape' => 'PutObjectResponse', ], 'errors' => [ [ 'shape' => 'ContainerNotFoundException', ], [ 'shape' => 'InternalServerError', ], ], 'authtype' => 'v4-unsigned-body', ], ], 'shapes' => [ 'ContainerNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'ContentRangePattern' => [ 'type' => 'string', 'pattern' => '^bytes=\\d+\\-\\d+/\\d+$', ], 'ContentType' => [ 'type' => 'string', 'pattern' => '^[\\w\\-\\/\\.\\+]{1,255}$', ], 'DeleteObjectRequest' => [ 'type' => 'structure', 'required' => [ 'Path', ], 'members' => [ 'Path' => [ 'shape' => 'PathNaming', 'location' => 'uri', 'locationName' => 'Path', ], ], ], 'DeleteObjectResponse' => [ 'type' => 'structure', 'members' => [], ], 'DescribeObjectRequest' => [ 'type' => 'structure', 'required' => [ 'Path', ], 'members' => [ 'Path' => [ 'shape' => 'PathNaming', 'location' => 'uri', 'locationName' => 'Path', ], ], ], 'DescribeObjectResponse' => [ 'type' => 'structure', 'members' => [ 'ETag' => [ 'shape' => 'ETag', 'location' => 'header', 'locationName' => 'ETag', ], 'ContentType' => [ 'shape' => 'ContentType', 'location' => 'header', 'locationName' => 'Content-Type', ], 'ContentLength' => [ 'shape' => 'NonNegativeLong', 'location' => 'header', 'locationName' => 'Content-Length', ], 'CacheControl' => [ 'shape' => 'StringPrimitive', 'location' => 'header', 'locationName' => 'Cache-Control', ], 'LastModified' => [ 'shape' => 'TimeStamp', 'location' => 'header', 'locationName' => 'Last-Modified', ], ], ], 'ETag' => [ 'type' => 'string', 'max' => 64, 'min' => 1, 'pattern' => '[0-9A-Fa-f]+', ], 'ErrorMessage' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '[ \\w:\\.\\?-]+', ], 'GetObjectRequest' => [ 'type' => 'structure', 'required' => [ 'Path', ], 'members' => [ 'Path' => [ 'shape' => 'PathNaming', 'location' => 'uri', 'locationName' => 'Path', ], 'Range' => [ 'shape' => 'RangePattern', 'location' => 'header', 'locationName' => 'Range', ], ], ], 'GetObjectResponse' => [ 'type' => 'structure', 'required' => [ 'StatusCode', ], 'members' => [ 'Body' => [ 'shape' => 'PayloadBlob', ], 'CacheControl' => [ 'shape' => 'StringPrimitive', 'location' => 'header', 'locationName' => 'Cache-Control', ], 'ContentRange' => [ 'shape' => 'ContentRangePattern', 'location' => 'header', 'locationName' => 'Content-Range', ], 'ContentLength' => [ 'shape' => 'NonNegativeLong', 'location' => 'header', 'locationName' => 'Content-Length', ], 'ContentType' => [ 'shape' => 'ContentType', 'location' => 'header', 'locationName' => 'Content-Type', ], 'ETag' => [ 'shape' => 'ETag', 'location' => 'header', 'locationName' => 'ETag', ], 'LastModified' => [ 'shape' => 'TimeStamp', 'location' => 'header', 'locationName' => 'Last-Modified', ], 'StatusCode' => [ 'shape' => 'statusCode', 'location' => 'statusCode', ], ], 'payload' => 'Body', ], 'InternalServerError' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, 'fault' => true, ], 'Item' => [ 'type' => 'structure', 'members' => [ 'Name' => [ 'shape' => 'ItemName', ], 'Type' => [ 'shape' => 'ItemType', ], 'ETag' => [ 'shape' => 'ETag', ], 'LastModified' => [ 'shape' => 'TimeStamp', ], 'ContentType' => [ 'shape' => 'ContentType', ], 'ContentLength' => [ 'shape' => 'NonNegativeLong', ], ], ], 'ItemList' => [ 'type' => 'list', 'member' => [ 'shape' => 'Item', ], ], 'ItemName' => [ 'type' => 'string', 'pattern' => '[A-Za-z0-9_\\.\\-\\~]+', ], 'ItemType' => [ 'type' => 'string', 'enum' => [ 'OBJECT', 'FOLDER', ], ], 'ListItemsRequest' => [ 'type' => 'structure', 'members' => [ 'Path' => [ 'shape' => 'ListPathNaming', 'location' => 'querystring', 'locationName' => 'Path', ], 'MaxResults' => [ 'shape' => 'ListLimit', 'location' => 'querystring', 'locationName' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'PaginationToken', 'location' => 'querystring', 'locationName' => 'NextToken', ], ], ], 'ListItemsResponse' => [ 'type' => 'structure', 'members' => [ 'Items' => [ 'shape' => 'ItemList', ], 'NextToken' => [ 'shape' => 'PaginationToken', ], ], ], 'ListLimit' => [ 'type' => 'integer', 'max' => 1000, 'min' => 1, ], 'ListPathNaming' => [ 'type' => 'string', 'max' => 900, 'min' => 0, 'pattern' => '/?(?:[A-Za-z0-9_\\.\\-\\~]+/){0,10}(?:[A-Za-z0-9_\\.\\-\\~]+)?/?', ], 'NonNegativeLong' => [ 'type' => 'long', 'min' => 0, ], 'ObjectNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'PaginationToken' => [ 'type' => 'string', ], 'PathNaming' => [ 'type' => 'string', 'max' => 900, 'min' => 1, 'pattern' => '(?:[A-Za-z0-9_\\.\\-\\~]+/){0,10}[A-Za-z0-9_\\.\\-\\~]+', ], 'PayloadBlob' => [ 'type' => 'blob', 'streaming' => true, ], 'PutObjectRequest' => [ 'type' => 'structure', 'required' => [ 'Body', 'Path', ], 'members' => [ 'Body' => [ 'shape' => 'PayloadBlob', ], 'Path' => [ 'shape' => 'PathNaming', 'location' => 'uri', 'locationName' => 'Path', ], 'ContentType' => [ 'shape' => 'ContentType', 'location' => 'header', 'locationName' => 'Content-Type', ], 'CacheControl' => [ 'shape' => 'StringPrimitive', 'location' => 'header', 'locationName' => 'Cache-Control', ], 'StorageClass' => [ 'shape' => 'StorageClass', 'location' => 'header', 'locationName' => 'x-amz-storage-class', ], ], 'payload' => 'Body', ], 'PutObjectResponse' => [ 'type' => 'structure', 'members' => [ 'ContentSHA256' => [ 'shape' => 'SHA256Hash', ], 'ETag' => [ 'shape' => 'ETag', ], 'StorageClass' => [ 'shape' => 'StorageClass', ], ], ], 'RangePattern' => [ 'type' => 'string', 'pattern' => '^bytes=(?:\\d+\\-\\d*|\\d*\\-\\d+)$', ], 'RequestedRangeNotSatisfiableException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'error' => [ 'httpStatusCode' => 416, ], 'exception' => true, ], 'SHA256Hash' => [ 'type' => 'string', 'max' => 64, 'min' => 64, 'pattern' => '[0-9A-Fa-f]{64}', ], 'StorageClass' => [ 'type' => 'string', 'enum' => [ 'TEMPORAL', ], 'max' => 16, 'min' => 1, ], 'StringPrimitive' => [ 'type' => 'string', ], 'TimeStamp' => [ 'type' => 'timestamp', ], 'statusCode' => [ 'type' => 'integer', ], ],];