<?php
// This file was auto-generated from sdk-root/src/data/eks/2017-11-01/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2017-11-01', 'endpointPrefix' => 'eks', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'Amazon EKS', 'serviceFullName' => 'Amazon Elastic Container Service for Kubernetes', 'serviceId' => 'EKS', 'signatureVersion' => 'v4', 'signingName' => 'eks', 'uid' => 'eks-2017-11-01', ], 'operations' => [ 'CreateCluster' => [ 'name' => 'CreateCluster', 'http' => [ 'method' => 'POST', 'requestUri' => '/clusters', ], 'input' => [ 'shape' => 'CreateClusterRequest', ], 'output' => [ 'shape' => 'CreateClusterResponse', ], 'errors' => [ [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'ResourceLimitExceededException', ], [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'ClientException', ], [ 'shape' => 'ServerException', ], [ 'shape' => 'ServiceUnavailableException', ], [ 'shape' => 'UnsupportedAvailabilityZoneException', ], ], ], 'DeleteCluster' => [ 'name' => 'DeleteCluster', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/clusters/{name}', ], 'input' => [ 'shape' => 'DeleteClusterRequest', ], 'output' => [ 'shape' => 'DeleteClusterResponse', ], 'errors' => [ [ 'shape' => 'ResourceInUseException', ], [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ClientException', ], [ 'shape' => 'ServerException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'DescribeCluster' => [ 'name' => 'DescribeCluster', 'http' => [ 'method' => 'GET', 'requestUri' => '/clusters/{name}', ], 'input' => [ 'shape' => 'DescribeClusterRequest', ], 'output' => [ 'shape' => 'DescribeClusterResponse', ], 'errors' => [ [ 'shape' => 'ResourceNotFoundException', ], [ 'shape' => 'ClientException', ], [ 'shape' => 'ServerException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], 'ListClusters' => [ 'name' => 'ListClusters', 'http' => [ 'method' => 'GET', 'requestUri' => '/clusters', ], 'input' => [ 'shape' => 'ListClustersRequest', ], 'output' => [ 'shape' => 'ListClustersResponse', ], 'errors' => [ [ 'shape' => 'InvalidParameterException', ], [ 'shape' => 'ClientException', ], [ 'shape' => 'ServerException', ], [ 'shape' => 'ServiceUnavailableException', ], ], ], ], 'shapes' => [ 'Certificate' => [ 'type' => 'structure', 'members' => [ 'data' => [ 'shape' => 'String', ], ], ], 'ClientException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'Cluster' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'String', ], 'arn' => [ 'shape' => 'String', ], 'createdAt' => [ 'shape' => 'Timestamp', ], 'version' => [ 'shape' => 'String', ], 'endpoint' => [ 'shape' => 'String', ], 'roleArn' => [ 'shape' => 'String', ], 'resourcesVpcConfig' => [ 'shape' => 'VpcConfigResponse', ], 'status' => [ 'shape' => 'ClusterStatus', ], 'certificateAuthority' => [ 'shape' => 'Certificate', ], 'clientRequestToken' => [ 'shape' => 'String', ], 'platformVersion' => [ 'shape' => 'String', ], ], ], 'ClusterName' => [ 'type' => 'string', 'max' => 255, 'min' => 1, 'pattern' => '[A-Za-z0-9\\-_]*', ], 'ClusterStatus' => [ 'type' => 'string', 'enum' => [ 'CREATING', 'ACTIVE', 'DELETING', 'FAILED', ], ], 'CreateClusterRequest' => [ 'type' => 'structure', 'required' => [ 'name', 'roleArn', 'resourcesVpcConfig', ], 'members' => [ 'name' => [ 'shape' => 'ClusterName', ], 'version' => [ 'shape' => 'String', ], 'roleArn' => [ 'shape' => 'String', ], 'resourcesVpcConfig' => [ 'shape' => 'VpcConfigRequest', ], 'clientRequestToken' => [ 'shape' => 'String', 'idempotencyToken' => true, ], ], ], 'CreateClusterResponse' => [ 'type' => 'structure', 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'DeleteClusterRequest' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'name', ], ], ], 'DeleteClusterResponse' => [ 'type' => 'structure', 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'DescribeClusterRequest' => [ 'type' => 'structure', 'required' => [ 'name', ], 'members' => [ 'name' => [ 'shape' => 'String', 'location' => 'uri', 'locationName' => 'name', ], ], ], 'DescribeClusterResponse' => [ 'type' => 'structure', 'members' => [ 'cluster' => [ 'shape' => 'Cluster', ], ], ], 'InvalidParameterException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ListClustersRequest' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListClustersRequestMaxResults', 'location' => 'querystring', 'locationName' => 'maxResults', ], 'nextToken' => [ 'shape' => 'String', 'location' => 'querystring', 'locationName' => 'nextToken', ], ], ], 'ListClustersRequestMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 1, ], 'ListClustersResponse' => [ 'type' => 'structure', 'members' => [ 'clusters' => [ 'shape' => 'StringList', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ResourceInUseException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, ], 'exception' => true, ], 'ResourceLimitExceededException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, ], 'exception' => true, ], 'ServerException' => [ 'type' => 'structure', 'members' => [ 'clusterName' => [ 'shape' => 'String', ], 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, ], 'ServiceUnavailableException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 503, ], 'exception' => true, 'fault' => true, ], 'String' => [ 'type' => 'string', ], 'StringList' => [ 'type' => 'list', 'member' => [ 'shape' => 'String', ], ], 'Timestamp' => [ 'type' => 'timestamp', ], 'UnsupportedAvailabilityZoneException' => [ 'type' => 'structure', 'members' => [ 'message' => [ 'shape' => 'String', ], 'clusterName' => [ 'shape' => 'String', ], 'validZones' => [ 'shape' => 'StringList', ], ], 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, ], 'VpcConfigRequest' => [ 'type' => 'structure', 'required' => [ 'subnetIds', ], 'members' => [ 'subnetIds' => [ 'shape' => 'StringList', ], 'securityGroupIds' => [ 'shape' => 'StringList', ], ], ], 'VpcConfigResponse' => [ 'type' => 'structure', 'members' => [ 'subnetIds' => [ 'shape' => 'StringList', ], 'securityGroupIds' => [ 'shape' => 'StringList', ], 'vpcId' => [ 'shape' => 'String', ], ], ], ],];